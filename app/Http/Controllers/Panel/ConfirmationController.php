<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Jobs\SendConfirmationEmail;
use App\User;

class ConfirmationController extends Controller
{


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('notConfirmed');
  }


  /**
   * Страница активации пользователя
   *
   * @return Response
   */
  public function confirmationNotification(Request $request)
  {
    $user = $request->user();

    // проверка, существует ли пользователь в таблице подтверждений
    if ($confirmation = $user->confirmation()->first()) {
      $lifetime = Carbon::parse($confirmation->lifetime)->timestamp; // время смерти ключа в секундах
      $now = Carbon::now()->timestamp; // текущее время в секундах
      if ($lifetime >= $now) {
        // если ключ еще жив, то ждем его смерти
        $timeleft = $lifetime - $now;
        $resend = false;
      } else {
        // если ключ умер, то удаляем его
        $confirmation->delete();
      }
    }

    // если ключа не существует (или он был удален), даем возможность отправить письмо еще раз
    if (!($user->confirmation()->first())) {
      $timeleft = null;
      $resend = true;
    }

    return view('auth.confirmation', ['resend' => $resend, 'timeleft' => $timeleft]);
  }


  /**
   * Логика повторной отправки подтверждающего письма пользователю
   *
   * @return Response
   */
  public function confirmationResend(Request $request)
  {
    $user = $request->user();
    // если пользователя нет в таблице confirmations, по добавляем его и повторно отправляем письмо
    if (!($user->confirmation()->first())) {
      $data = $user->addToConfirmations();
      dispatch((new SendConfirmationEmail($user, $data['token'], $data['lifetime']))->delay(1));
    }
    // редирект
    return back()->with('status', 'Письмо уже в пути! Проверьте почту!');
  }


  /**
   * Логика подтверждения пользователя
   *
   * @param $request Request
   * @param $id integer id пользователя
   * @param $token string ключ подтверждение почты пользователя
   * @return mixed
   */
  public function confirmation(Request $request, $id, $token)
  {
    // пытаемся найти такого пользователя
    $user = User::findOrFail($id);
    // пытаемся найти у него токен
    $confirmation = $user->confirmation()->firstOrFail();
    // совпадение введенного токена с истиным токеном пользователя
    if ($confirmation->token == $token) {
      // пользователь подтвержден
      $user->confirmed = 1;
      $user->save();
      // запись с подтверждающим токеном удалена
      $confirmation->delete();
      // редирект
      return redirect('/panel')->with('status', 'Ваш E-mail успешно подтвержден!');
    } else abort(404); // выдает ошибку 404, если введенный токен не совпадает с истиным токеном пользователя
  }
}

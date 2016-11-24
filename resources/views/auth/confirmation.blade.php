@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Confirmation</div>
                    <div class="panel-body">

                        @if (session('status'))
                            <p>{{ session('status') }}</p>
                        @else
                            @if ($resend === true)
                                <form class="form-horizontal" role="form" method="post"
                                      action="{{ url('/panel/confirmation') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" name="submit">
                                                Отправить письмо повторно
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <p>Прошлый ключ теперь недействителен.</p>
                            @elseif ($resend === false)
                                <p>На Вашу почту было отправлено письмо, для её подтверждения.</p>
                                <p>Не получили письмо? Вы сможете отправить его повторно
                                    через {{ $timeleft }} секунд.</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

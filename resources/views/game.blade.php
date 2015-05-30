@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="../game/attack" class="btn btn-default">攻撃</a>
                <a href="../game/heal" class="btn btn-default">回復</a>
                <a href="../game/buy" class="btn btn-default">購入</a>
                <a href="../game/reset_monster" class="btn btn-default">モンスターリセット</a>

                <div class="btn-group" role="group">
                    <a href="../game/create" class="btn btn-default">新規作成</a>
                    <a href="../game/delete" class="btn btn-default">削除</a>
                    <a href="../game/save" class="btn btn-default">セーブ</a>
                    <a href="../game/load" class="btn btn-default">ロード</a>
                </div>

                <hr/>
                @if (is_array($messages))
                    <div class="alert alert-success" role="alert">
                        @foreach ($messages as $message)
                            {{$message}}<br/>
                        @endforeach
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Game01</div>

                    <div class="panel-body">
                        @if (!Session::has('savedata'))
                            Empty Savedata!!
                        @else
                            <div class="col-md-3">
                                <table class="table table-condensed">
                                    <tr class="right">
                                        <th>レベル</th>
                                        <td>{{Session::get('savedata')['level']}}</td>
                                    </tr>
                                    <tr>
                                        <th>経験値</th>
                                        <td>{{Session::get('savedata')['exp']}}</td>
                                    </tr>
                                    <tr>
                                        <th>体力</th>
                                        <td>{{Session::get('savedata')['hp']}} / {{Session::get('savedata')['max_hp']}}</td>
                                    </tr>
                                    <tr>
                                        <th>お金</th>
                                        <td>{{Session::get('savedata')['gold']}}</td>
                                    </tr>
                                    <tr>
                                        <th>攻撃力</th>
                                        <td>{{Session::get('savedata')['atk']}}</td>
                                    </tr>
                                    <tr>
                                        <th>防御力</th>
                                        <td>{{Session::get('savedata')['def']}}</td>
                                    </tr>
                                    <tr>
                                        <th>回復薬</th>
                                        <td>{{Session::get('savedata')['heal']}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                @if (Session::has('monster'))
                                    <table class="table table-condensed">
                                        <tr>
                                            <th>モンスター</th>
                                            <td>{{Session::get('monster')['name']}}</td>
                                        </tr>
                                        <tr>
                                            <th>体力</th>
                                            <td>
                                                {{Session::get('monster')['hp']}}
                                                /
                                                {{Session::get('monster')['max_hp']}}
                                           </td>
                                        </tr>
                                    </table>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <pre>
                    {{var_export(Session::all())}}
                </pre>
            </div>
        </div>
    </div>
@endsection

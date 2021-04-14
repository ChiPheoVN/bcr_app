@extends('master')

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <table class="table table-bordered text-center table-card-input">
                        <thead>
                            <tr>
                                <th colspan="3">Player</th>
                                <th colspan="3">Banker</th>
                            </tr>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>B1</th>
                                <th>B2</th>
                                <th>B3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control txt-card-input-p1" placeholder="P1" name="player[1]"></td>
                                <td><input type="text" class="form-control txt-card-input-p2" placeholder="P2" name="player[2]"></td>
                                <td><input type="text" class="form-control txt-card-input-p3" placeholder="P3" name="player[3]"></td>
                                <td><input type="text" class="form-control txt-card-input-b1" placeholder="B1" name="banker[1]"></td>
                                <td><input type="text" class="form-control txt-card-input-b2" placeholder="B2" name="banker[2]"></td>
                                <td><input type="text" class="form-control txt-card-input-b3" placeholder="B3" name="banker[3]"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary btn-style btn-add-game-result mt-4">Add game result</button>                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                    <table class="table table-bordered text-center table-game-result">
                        <thead>
                            <tr>
                                <th colspan="3">Player</th>
                                <th colspan="3">Banker</th>
                                <th rowspan="2" class="align-middle">PV</th>
                                <th rowspan="2" class="align-middle">BV</th>
                                <th rowspan="2" class="align-middle">WIN</th>
                            </tr>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>B1</th>
                                <th>B2</th>
                                <th>B3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-template-game-result d-none">
                                <td class="td-p1">a</td>
                                <td class="td-p2">a</td>
                                <td class="td-p3">2</td>
                                <td class="td-b1">2</td>
                                <td class="td-b2">2</td>
                                <td class="td-b3">3</td>
                                <td class="td-pv">4</td>
                                <td class="td-bv">7</td>
                                <td class="td-win">banker</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

b:@section('script')
    <script src="{{ asset('') }}assets/games/bacarat/js/script.js"></script>
@endsection
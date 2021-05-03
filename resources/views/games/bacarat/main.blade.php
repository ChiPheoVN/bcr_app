@extends('master')

@section('head')
    <link rel="stylesheet" href="{{ asset('') }}assets/games/bacarat/css/style.min.css">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card card_border mb-4">
                <div class="card-header">Input</div>
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
                                <td><input data-card-input-index="1" type="text" class="form-control txt-card-input-p1 txt-card-input" placeholder="P1" name="player[1]"></td>
                                <td><input data-card-input-index="2" type="text" class="form-control txt-card-input-p2 txt-card-input" placeholder="P2" name="player[2]"></td>
                                <td><input data-card-input-index="3" type="text" class="form-control txt-card-input-p3 txt-card-input" placeholder="P3" name="player[3]"></td>
                                <td><input data-card-input-index="4" type="text" class="form-control txt-card-input-b1 txt-card-input" placeholder="B1" name="banker[1]"></td>
                                <td><input data-card-input-index="5" type="text" class="form-control txt-card-input-b2 txt-card-input" placeholder="B2" name="banker[2]"></td>
                                <td><input data-card-input-index="6" type="text" class="form-control txt-card-input-b3 txt-card-input" placeholder="B3" name="banker[3]"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="container-fluid">
                            <button type="button" class="btn btn-primary btn-style btn-add-game-result mt-4" data-toggle="tooltip" data-placement="top" title="Add game result"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Reset result" type="button" class="btn btn-danger pull-right btn-style btn-reset-result mt-4"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Remove previous result" type="button" class="btn btn-info pull-right btn-style btn-remove-previous-result mt-4 mr-1"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card_border py-2 mb-4">
                <div class="card-body">                    
                    <table class="table table-bordered text-center table-guess d-none mb-0">
                        <tbody>
                            <tr>
                                <td class="td-winner-color" style="background: blue;color: #fff;"></td>
                                <td class="td-winner-percentage"></td>
                            </tr>
                        </tbody>
                    </table>                    
                </div>
            </div>
            <div class="card card_border mb-4">
                <div class="card-header">Virtual keyboard
                    <button class="btn btn-outline-warning pull-right btn-sm btn-toggle-virtual-keyboard" aria-hidden="true" data-toggle="collapse" data-target="#collapseVirtualKeyboard" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-keyboard-o"></i></button>
                </div>
                <div class="card-body collapse" id="collapseVirtualKeyboard">
                    <div class="virtual-keyboard-container">
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">A</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">2</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">3</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">4</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">5</button>
                        </div>
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">6</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">7</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">8</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">9</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">10</button>
                        </div>
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">J</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">Q</button>
                            <button type="button" class="btn btn-outline-primary w-20 btn-virtual-card">K</button>
                            <button type="button" class="btn btn-info w-20 btn-remove-previous-result"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger w-20 btn-reset-result"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card_border mb-4">
                <div class="card-header">Score board</div>
                <div class="card-body">
                    <table class="table table-bordered text-center table-score-board">
                        <tbody>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card_border mb-4">
                <div class="card-header">Counting card</div>
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

@section('script')
    <script src="{{ asset('') }}assets/games/bacarat/js/script.min.js"></script>
@endsection
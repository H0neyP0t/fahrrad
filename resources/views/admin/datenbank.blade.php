<div class="row">
<div class="col-md-6">
    <div class="panel panel-default" id="panelAdmin">
        <div class="panel-heading" id="panelHeadingAdmin">
            <h3 class="panel-title pull-left" id="panelTitelAdmin">Fahrer</h3>
            <div class="row col-md-12" id="fahrerNav">
                <button type="button" class="btn btn-default pull-right">Hilfe</button>
                    <button type="button" class="btn btn-default pull-right" id="btnAddFahrer">
                        <span class="glyphicon glyphicon-plus"></span>
                        Fahrer hinzufügen
                    </button>


                <div class="input-group col-md-4 pull-right">
                    <input type="text" class="form-control" placeholder="Suche" id="q" name="q">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                </div>
            </div>
            <span class="clearfix"></span>
        </div>
        <div class="panel-body" id="panelBodyAdmin">



            <div class="formAddFahrer">
                <strong>Neuen Fahrer anlegen:</strong>
                <form action="{{ url("fahrer") }}" method="POST">
                    <table class="table table-striped table-bordered table-hover" id="newUserTable">
                        <thead>
                        <tr>
                            <th>Name*</th>
                            <th>Email</th>
                            <th>Gewicht (kg)</th>
                            <th>Größe (m)</th>
                            <th colspan="2">Optionen</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="name"></td>
                                <td id="email"></td>
                                <td id="gewicht"></td>
                                <td id="groesse"></td>
                                <th>
                                    <div class="btn btn-default btnSave" style="width: 100%;">
                                        <span class="glyphicon glyphicon-floppy-save"></span>
                                    </div>
                                </th>
                                <th>
                                    <div class="btn btn-default btnCancel" style="width: 100%;">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6"><small><strong>Legende</strong> * = Pflichtfeld</small></td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
            </div>



            <form action="{{ url("fahrer") }}" method="PUT">
                <table class="table table-striped table-bordered table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gewicht</th>
                            <th>Größe</th>
                            <th>Betriebsmodus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fahrer as $f)
                        <tr draggable="true" id="{{$f->id}}">
                            <th id="th_fahrer_id">
                                <fieldset>
                                    <input type="radio" name="radio_fahrer_id" class="radio-fahrer-id" value="{{$f->id}}">
                                </fieldset>
                            </th>
                            <td id="name">{{$f->name}}</td>
                            <td id="email">{{$f->email}}</td>
                            <td id="gewicht">{{$f->gewicht}}</td>
                            <td id="groesse">{{$f->groesse}}</td>
                            <th id="betriebsmodus">
                                <select class="form-control" id="betriebsmodusAuswahlFahrer">
                                    @foreach($modi as $modus)
                                        @if($f->modus_id == $modus->id)
                                            <option value="{{ $modus->id }}" selected>{{ $modus->name }}</option>
                                        @else
                                            <option value="{{ $modus->id }}">{{ $modus->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <div class="btn btn-default btnDelete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
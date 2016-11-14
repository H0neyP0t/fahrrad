<div id="fahrrad-information-wrapper-mobile">
    <div class="fahrrad-wrapper-mobile" id="{{ $fahrrad->id }}">
        <div class="row">
            <div class="col-xs-6">Geschwindigkeit</div>
            <div id="geschwindigkeit-anzeige-{{ $fahrrad->id }}" class="col-md-6">{{ $fahrrad->geschwindigkeit }} km/h</div>
        </div>
        <div class="row">
            <div class="col-xs-6">Erzeugte Leistung</div>
            <div id="istLeistung-anzeige-{{ $fahrrad->id }}" class="col-md-6">{{ $fahrrad->istLeistung }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">Zurückgelegte Strecke</div>
            <div id="strecke-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->strecke }} m</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-6">sollLeistung</div>
            <div id="sollLeistung-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->sollLeistung }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">sollDrehmoment</div>
            <div id="sollDrehmoment-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->sollDrehmoment }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">strecke_id</div>
            <div id="strecke_id-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->strecke_id }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">abschnitt_id</div>
            <div id="abschnitt_id-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->abschnitt_id }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">Erstellt</div>
            <div id="created_at-anzeige-{{ $fahrrad->id }}" class="col-xs-6">{{ $fahrrad->created_at }}</div>
        </div>
        <div class="row">
            <div class="col-xs-6">Aktualisiert</div>
            <div id="updated_at-anzeige-{{ $fahrrad->id }}" class="col-md-6">{{ $fahrrad->updated_at }}</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
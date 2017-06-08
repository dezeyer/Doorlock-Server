<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 22:34
 */?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">RFID Chips</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>1. Chip wird auf RFID Leser gehalten -> Abfrage an RPI, ob Chip ID im System vorhanden ist.</h4>
                        <pre>REQUEST: /api.php?doorclient=%DOORCLIENTID%&check=%CHIPID%
RETURN:</pre>
a. Chip ID im System nicht vorhanden: (Hinterlegt nicht bekannten Chip in DB, um Name,Pin,Mail hinterlegen zu können.)
<pre>0
Chip nicht vorhanden.*</pre>
b. Chip ID im System vorhanden, jedoch nicht initialisiert (Name,Pin,Mail)
<pre>1
Chip nicht vorhanden.</pre>
c. Chip ID im System vorhanden, Name, Pin, Mail hinterlegt.
<pre>2
Hallo $name Pin:</pre>
<br>
<h4>2. Wenn Status = 2: Pin eingeben -> Anfrage mit Pin & ChipID an RPI</h4>
<pre>REQUEST: /api.php?doorclient=%DOORCLIENTID%&login=%CHIPID%&pin=%PIN%</pre>
a. Pin stimmt mit ChipID überein:
<pre>3
Zugriff: Tuer oeffnet</pre>
b. Pin stimmt nicht mit ChipID überein:
<pre>4
Kein Zugriff</pre>
<br>
<h4>3. Fehler: (Code 5, MSG Beschreibung)</h4>
<pre>5
$var missing</pre>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
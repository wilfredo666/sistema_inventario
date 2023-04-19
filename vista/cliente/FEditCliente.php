<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorCliente::ctrInfoCliente($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCliente">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon Social Cliente</label>
      <input type="text" class="form-control" id="rzCliente" name="rzCliente" value="<?php echo $cliente["razon_social_cliente"]; ?>">
      <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
      <label for="">N.I.T. / C.I.</label>
      <input type="text" class="form-control" id="nitCliente" name="nitCliente" value="<?php echo $cliente["nit_ci_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirCliente" name="dirCliente" value="<?php echo $cliente["direccion_cliente"]; ?>">
      <p class="text-danger" id="error-pass"></p>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Pais</label>
        <select name="paisCliente" id="paisCliente" class="form-control select2bs4">
          <option value="">Seleccionar</option>
          <option value="AF" <?php if ($cliente["pais_cliente"] == "AF") : ?>selected<?php endif; ?>>Afganistán</option>
          <option value="AL" <?php if ($cliente["pais_cliente"] == "AL") : ?>selected<?php endif; ?>>Albania</option>
          <option value="DE" <?php if ($cliente["pais_cliente"] == "DE") : ?>selected<?php endif; ?>>Alemania</option>
          <option value="AD" <?php if ($cliente["pais_cliente"] == "AD") : ?>selected<?php endif; ?>>Andorra</option>
          <option value="AO" <?php if ($cliente["pais_cliente"] == "AO") : ?>selected<?php endif; ?>>Angola</option>
          <option value="AI" <?php if ($cliente["pais_cliente"] == "AI") : ?>selected<?php endif; ?>>Anguilla</option>
          <option value="AQ" <?php if ($cliente["pais_cliente"] == "AQ") : ?>selected<?php endif; ?>>Antártida</option>
          <option value="AG" <?php if ($cliente["pais_cliente"] == "AG") : ?>selected<?php endif; ?>>Antigua y Barbuda</option>
          <option value="AN" <?php if ($cliente["pais_cliente"] == "AN") : ?>selected<?php endif; ?>>Antillas Holandesas</option>
          <option value="SA" <?php if ($cliente["pais_cliente"] == "SA") : ?>selected<?php endif; ?>>Arabia Saudí</option>
          <option value="DZ" <?php if ($cliente["pais_cliente"] == "DZ") : ?>selected<?php endif; ?>>Argelia</option>
          <option value="AR" <?php if ($cliente["pais_cliente"] == "AR") : ?>selected<?php endif; ?>>Argentina</option>
          <option value="AM" <?php if ($cliente["pais_cliente"] == "AM") : ?>selected<?php endif; ?>>Armenia</option>
          <option value="AW" <?php if ($cliente["pais_cliente"] == "AW") : ?>selected<?php endif; ?>>Aruba</option>
          <option value="AU" <?php if ($cliente["pais_cliente"] == "AU") : ?>selected<?php endif; ?>>Australia</option>
          <option value="AT" <?php if ($cliente["pais_cliente"] == "AT") : ?>selected<?php endif; ?>>Austria</option>
          <option value="AZ" <?php if ($cliente["pais_cliente"] == "AZ") : ?>selected<?php endif; ?>>Azerbaiyán</option>
          <option value="BS" <?php if ($cliente["pais_cliente"] == "BS") : ?>selected<?php endif; ?>>Bahamas</option>
          <option value="BH" <?php if ($cliente["pais_cliente"] == "BH") : ?>selected<?php endif; ?>>Bahrein</option>
          <option value="BD" <?php if ($cliente["pais_cliente"] == "BD") : ?>selected<?php endif; ?>>Bangladesh</option>
          <option value="BB" <?php if ($cliente["pais_cliente"] == "BB") : ?>selected<?php endif; ?>>Barbados</option>
          <option value="BE" <?php if ($cliente["pais_cliente"] == "BE") : ?>selected<?php endif; ?>>Bélgica</option>
          <option value="BZ" <?php if ($cliente["pais_cliente"] == "BZ") : ?>selected<?php endif; ?>>Belice</option>
          <option value="BJ" <?php if ($cliente["pais_cliente"] == "BJ") : ?>selected<?php endif; ?>>Benin</option>
          <option value="BM" <?php if ($cliente["pais_cliente"] == "BM") : ?>selected<?php endif; ?>>Bermudas</option>
          <option value="BY" <?php if ($cliente["pais_cliente"] == "BY") : ?>selected<?php endif; ?>>Bielorrusia</option>
          <option value="MM" <?php if ($cliente["pais_cliente"] == "MM") : ?>selected<?php endif; ?>>Birmania</option>
          <option value="BO" <?php if ($cliente["pais_cliente"] == "BO") : ?>selected<?php endif; ?>>Bolivia</option>
          <option value="BA" <?php if ($cliente["pais_cliente"] == "BA") : ?>selected<?php endif; ?>>Bosnia y Herzegovina</option>
          <option value="BW" <?php if ($cliente["pais_cliente"] == "BW") : ?>selected<?php endif; ?>>Botswana</option>
          <option value="BR" <?php if ($cliente["pais_cliente"] == "BR") : ?>selected<?php endif; ?>>Brasil</option>
          <option value="BN" <?php if ($cliente["pais_cliente"] == "BN") : ?>selected<?php endif; ?>>Brunei</option>
          <option value="BG" <?php if ($cliente["pais_cliente"] == "BG") : ?>selected<?php endif; ?>>Bulgaria</option>
          <option value="BF" <?php if ($cliente["pais_cliente"] == "BF") : ?>selected<?php endif; ?>>Burkina Faso</option>
          <option value="BI" <?php if ($cliente["pais_cliente"] == "BI") : ?>selected<?php endif; ?>>Burundi</option>
          <option value="BT" <?php if ($cliente["pais_cliente"] == "BT") : ?>selected<?php endif; ?>>Bután</option>
          <option value="CV" <?php if ($cliente["pais_cliente"] == "CV") : ?>selected<?php endif; ?>>Cabo Verde</option>
          <option value="KH" <?php if ($cliente["pais_cliente"] == "KH") : ?>selected<?php endif; ?>>Camboya</option>
          <option value="CM" <?php if ($cliente["pais_cliente"] == "CM") : ?>selected<?php endif; ?>>Camerún</option>
          <option value="CA" <?php if ($cliente["pais_cliente"] == "CA") : ?>selected<?php endif; ?>>Canadá</option>
          <option value="TD" <?php if ($cliente["pais_cliente"] == "TD") : ?>selected<?php endif; ?>>Chad</option>
          <option value="CL" <?php if ($cliente["pais_cliente"] == "CL") : ?>selected<?php endif; ?>>Chile</option>
          <option value="CN" <?php if ($cliente["pais_cliente"] == "CN") : ?>selected<?php endif; ?>>China</option>
          <option value="CY" <?php if ($cliente["pais_cliente"] == "CY") : ?>selected<?php endif; ?>>Chipre</option>
          <option value="VA" <?php if ($cliente["pais_cliente"] == "VA") : ?>selected<?php endif; ?>>Ciudad del Vaticano (Santa Sede)</option>
          <option value="CO" <?php if ($cliente["pais_cliente"] == "CO") : ?>selected<?php endif; ?>>Colombia</option>
          <option value="KM" <?php if ($cliente["pais_cliente"] == "KM") : ?>selected<?php endif; ?>>Comores</option>
          <option value="CG" <?php if ($cliente["pais_cliente"] == "CG") : ?>selected<?php endif; ?>>Congo</option>
          <option value="CD" <?php if ($cliente["pais_cliente"] == "CD") : ?>selected<?php endif; ?>>Congo, República Democrática del</option>
          <option value="KR" <?php if ($cliente["pais_cliente"] == "KR") : ?>selected<?php endif; ?>>Corea</option>
          <option value="KP" <?php if ($cliente["pais_cliente"] == "KP") : ?>selected<?php endif; ?>>Corea del Norte</option>
          <option value="CI" <?php if ($cliente["pais_cliente"] == "CI") : ?>selected<?php endif; ?>>Costa de Marfíl</option>
          <option value="CR" <?php if ($cliente["pais_cliente"] == "CR") : ?>selected<?php endif; ?>>Costa Rica</option>
          <option value="HR" <?php if ($cliente["pais_cliente"] == "HR") : ?>selected<?php endif; ?>>Croacia (Hrvatska)</option>
          <option value="CU" <?php if ($cliente["pais_cliente"] == "CU") : ?>selected<?php endif; ?>>Cuba</option>
          <option value="DK" <?php if ($cliente["pais_cliente"] == "DK") : ?>selected<?php endif; ?>>Dinamarca</option>
          <option value="DJ" <?php if ($cliente["pais_cliente"] == "DJ") : ?>selected<?php endif; ?>>Djibouti</option>
          <option value="DM" <?php if ($cliente["pais_cliente"] == "DM") : ?>selected<?php endif; ?>>Dominica</option>
          <option value="EC" <?php if ($cliente["pais_cliente"] == "EC") : ?>selected<?php endif; ?>>Ecuador</option>
          <option value="EG" <?php if ($cliente["pais_cliente"] == "EG") : ?>selected<?php endif; ?>>Egipto</option>
          <option value="SV" <?php if ($cliente["pais_cliente"] == "SV") : ?>selected<?php endif; ?>>El Salvador</option>
          <option value="AE" <?php if ($cliente["pais_cliente"] == "AE") : ?>selected<?php endif; ?>>Emiratos Árabes Unidos</option>
          <option value="ER" <?php if ($cliente["pais_cliente"] == "ER") : ?>selected<?php endif; ?>>Eritrea</option>
          <option value="SI" <?php if ($cliente["pais_cliente"] == "SI") : ?>selected<?php endif; ?>>Eslovenia</option>
          <option value="ES" <?php if ($cliente["pais_cliente"] == "ES") : ?>selected<?php endif; ?>>España</option>
          <option value="US" <?php if ($cliente["pais_cliente"] == "US") : ?>selected<?php endif; ?>>Estados Unidos</option>
          <option value="EE" <?php if ($cliente["pais_cliente"] == "EE") : ?>selected<?php endif; ?>>Estonia</option>
          <option value="ET" <?php if ($cliente["pais_cliente"] == "ET") : ?>selected<?php endif; ?>>Etiopía</option>
          <option value="FJ" <?php if ($cliente["pais_cliente"] == "FJ") : ?>selected<?php endif; ?>>Fiji</option>
          <option value="PH" <?php if ($cliente["pais_cliente"] == "PH") : ?>selected<?php endif; ?>>Filipinas</option>
          <option value="FI" <?php if ($cliente["pais_cliente"] == "FI") : ?>selected<?php endif; ?>>Finlandia</option>
          <option value="FR" <?php if ($cliente["pais_cliente"] == "FR") : ?>selected<?php endif; ?>>Francia</option>
          <option value="GA" <?php if ($cliente["pais_cliente"] == "GA") : ?>selected<?php endif; ?>>Gabón</option>
          <option value="GM" <?php if ($cliente["pais_cliente"] == "GM") : ?>selected<?php endif; ?>>Gambia</option>
          <option value="GE" <?php if ($cliente["pais_cliente"] == "GE") : ?>selected<?php endif; ?>>Georgia</option>
          <option value="GH" <?php if ($cliente["pais_cliente"] == "GH") : ?>selected<?php endif; ?>>Ghana</option>
          <option value="GI" <?php if ($cliente["pais_cliente"] == "GI") : ?>selected<?php endif; ?>>Gibraltar</option>
          <option value="GD" <?php if ($cliente["pais_cliente"] == "GD") : ?>selected<?php endif; ?>>Granada</option>
          <option value="GR" <?php if ($cliente["pais_cliente"] == "GR") : ?>selected<?php endif; ?>>Grecia</option>
          <option value="GL" <?php if ($cliente["pais_cliente"] == "GL") : ?>selected<?php endif; ?>>Groenlandia</option>
          <option value="GP" <?php if ($cliente["pais_cliente"] == "GP") : ?>selected<?php endif; ?>>Guadalupe</option>
          <option value="GU" <?php if ($cliente["pais_cliente"] == "GU") : ?>selected<?php endif; ?>>Guam</option>
          <option value="GT" <?php if ($cliente["pais_cliente"] == "GT") : ?>selected<?php endif; ?>>Guatemala</option>
          <option value="GY" <?php if ($cliente["pais_cliente"] == "GY") : ?>selected<?php endif; ?>>Guayana</option>
          <option value="GF" <?php if ($cliente["pais_cliente"] == "GF") : ?>selected<?php endif; ?>>Guayana Francesa</option>
          <option value="GN" <?php if ($cliente["pais_cliente"] == "GN") : ?>selected<?php endif; ?>>Guinea</option>
          <option value="GQ" <?php if ($cliente["pais_cliente"] == "GQ") : ?>selected<?php endif; ?>>Guinea Ecuatorial</option>
          <option value="GW" <?php if ($cliente["pais_cliente"] == "GW") : ?>selected<?php endif; ?>>Guinea-Bissau</option>
          <option value="HT" <?php if ($cliente["pais_cliente"] == "HT") : ?>selected<?php endif; ?>>Haití</option>
          <option value="HN" <?php if ($cliente["pais_cliente"] == "HN") : ?>selected<?php endif; ?>>Honduras</option>
          <option value="HU" <?php if ($cliente["pais_cliente"] == "HU") : ?>selected<?php endif; ?>>Hungría</option>
          <option value="IN" <?php if ($cliente["pais_cliente"] == "IN") : ?>selected<?php endif; ?>>India</option>
          <option value="ID" <?php if ($cliente["pais_cliente"] == "ID") : ?>selected<?php endif; ?>>Indonesia</option>
          <option value="IQ" <?php if ($cliente["pais_cliente"] == "IQ") : ?>selected<?php endif; ?>>Irak</option>
          <option value="IR" <?php if ($cliente["pais_cliente"] == "IR") : ?>selected<?php endif; ?>>Irán</option>
          <option value="IE" <?php if ($cliente["pais_cliente"] == "IE") : ?>selected<?php endif; ?>>Irlanda</option>
          <option value="BV" <?php if ($cliente["pais_cliente"] == "BV") : ?>selected<?php endif; ?>>Isla Bouvet</option>
          <option value="CX" <?php if ($cliente["pais_cliente"] == "CX") : ?>selected<?php endif; ?>>Isla de Christmas</option>
          <option value="IS" <?php if ($cliente["pais_cliente"] == "IS") : ?>selected<?php endif; ?>>Islandia</option>
          <option value="KY" <?php if ($cliente["pais_cliente"] == "KY") : ?>selected<?php endif; ?>>Islas Caimán</option>
          <option value="CK" <?php if ($cliente["pais_cliente"] == "CK") : ?>selected<?php endif; ?>>Islas Cook</option>
          <option value="CC" <?php if ($cliente["pais_cliente"] == "CC") : ?>selected<?php endif; ?>>Islas de Cocos o Keeling</option>
          <option value="FO" <?php if ($cliente["pais_cliente"] == "FO") : ?>selected<?php endif; ?>>Islas Faroe</option>
          <option value="HM" <?php if ($cliente["pais_cliente"] == "HM") : ?>selected<?php endif; ?>>Islas Heard y McDonald</option>
          <option value="FK" <?php if ($cliente["pais_cliente"] == "FK") : ?>selected<?php endif; ?>>Islas Malvinas</option>
          <option value="MP" <?php if ($cliente["pais_cliente"] == "MP") : ?>selected<?php endif; ?>>Islas Marianas del Norte</option>
          <option value="MH" <?php if ($cliente["pais_cliente"] == "MH") : ?>selected<?php endif; ?>>Islas Marshall</option>
          <option value="UM" <?php if ($cliente["pais_cliente"] == "UM") : ?>selected<?php endif; ?>>Islas menores de Estados Unidos</option>
          <option value="PW" <?php if ($cliente["pais_cliente"] == "PW") : ?>selected<?php endif; ?>>Islas Palau</option>
          <option value="SB" <?php if ($cliente["pais_cliente"] == "SB") : ?>selected<?php endif; ?>>Islas Salomón</option>
          <option value="SJ" <?php if ($cliente["pais_cliente"] == "SJ") : ?>selected<?php endif; ?>>Islas Svalbard y Jan Mayen</option>
          <option value="TK" <?php if ($cliente["pais_cliente"] == "TK") : ?>selected<?php endif; ?>>Islas Tokelau</option>
          <option value="TC" <?php if ($cliente["pais_cliente"] == "TC") : ?>selected<?php endif; ?>>Islas Turks y Caicos</option>
          <option value="VI" <?php if ($cliente["pais_cliente"] == "VI") : ?>selected<?php endif; ?>>Islas Vírgenes (EEUU)</option>
          <option value="VG" <?php if ($cliente["pais_cliente"] == "VG") : ?>selected<?php endif; ?>>Islas Vírgenes (Reino Unido)</option>
          <option value="WF" <?php if ($cliente["pais_cliente"] == "WF") : ?>selected<?php endif; ?>>Islas Wallis y Futuna</option>
          <option value="IL" <?php if ($cliente["pais_cliente"] == "IL") : ?>selected<?php endif; ?>>Israel</option>
          <option value="IT" <?php if ($cliente["pais_cliente"] == "IT") : ?>selected<?php endif; ?>>Italia</option>
          <option value="JM" <?php if ($cliente["pais_cliente"] == "JM") : ?>selected<?php endif; ?>>Jamaica</option>
          <option value="JP" <?php if ($cliente["pais_cliente"] == "JP") : ?>selected<?php endif; ?>>Japón</option>
          <option value="JO" <?php if ($cliente["pais_cliente"] == "JO") : ?>selected<?php endif; ?>>Jordania</option>
          <option value="KZ" <?php if ($cliente["pais_cliente"] == "KZ") : ?>selected<?php endif; ?>>Kazajistán</option>
          <option value="KE" <?php if ($cliente["pais_cliente"] == "KE") : ?>selected<?php endif; ?>>Kenia</option>
          <option value="KG" <?php if ($cliente["pais_cliente"] == "KG") : ?>selected<?php endif; ?>>Kirguizistán</option>
          <option value="KI" <?php if ($cliente["pais_cliente"] == "KI") : ?>selected<?php endif; ?>>Kiribati</option>
          <option value="KW" <?php if ($cliente["pais_cliente"] == "KW") : ?>selected<?php endif; ?>>Kuwait</option>
          <option value="LA" <?php if ($cliente["pais_cliente"] == "LA") : ?>selected<?php endif; ?>>Laos</option>
          <option value="LS" <?php if ($cliente["pais_cliente"] == "LS") : ?>selected<?php endif; ?>>Lesotho</option>
          <option value="LV" <?php if ($cliente["pais_cliente"] == "LV") : ?>selected<?php endif; ?>>Letonia</option>
          <option value="LB" <?php if ($cliente["pais_cliente"] == "LB") : ?>selected<?php endif; ?>>Líbano</option>
          <option value="LR" <?php if ($cliente["pais_cliente"] == "LR") : ?>selected<?php endif; ?>>Liberia</option>
          <option value="LY" <?php if ($cliente["pais_cliente"] == "LY") : ?>selected<?php endif; ?>>Libia</option>
          <option value="LI" <?php if ($cliente["pais_cliente"] == "LI") : ?>selected<?php endif; ?>>Liechtenstein</option>
          <option value="LT" <?php if ($cliente["pais_cliente"] == "LT") : ?>selected<?php endif; ?>>Lituania</option>
          <option value="LU" <?php if ($cliente["pais_cliente"] == "LU") : ?>selected<?php endif; ?>>Luxemburgo</option>
          <option value="MK" <?php if ($cliente["pais_cliente"] == "MK") : ?>selected<?php endif; ?>>Macedonia, Ex-República Yugoslava de</option>
          <option value="MG" <?php if ($cliente["pais_cliente"] == "MG") : ?>selected<?php endif; ?>>Madagascar</option>
          <option value="MY" <?php if ($cliente["pais_cliente"] == "MY") : ?>selected<?php endif; ?>>Malasia</option>
          <option value="MW" <?php if ($cliente["pais_cliente"] == "MW") : ?>selected<?php endif; ?>>Malawi</option>
          <option value="MV" <?php if ($cliente["pais_cliente"] == "MV") : ?>selected<?php endif; ?>>Maldivas</option>
          <option value="ML" <?php if ($cliente["pais_cliente"] == "ML") : ?>selected<?php endif; ?>>Malí</option>
          <option value="MT" <?php if ($cliente["pais_cliente"] == "MT") : ?>selected<?php endif; ?>>Malta</option>
          <option value="MA" <?php if ($cliente["pais_cliente"] == "MA") : ?>selected<?php endif; ?>>Marruecos</option>
          <option value="MQ" <?php if ($cliente["pais_cliente"] == "MQ") : ?>selected<?php endif; ?>>Martinica</option>
          <option value="MU" <?php if ($cliente["pais_cliente"] == "MU") : ?>selected<?php endif; ?>>Mauricio</option>
          <option value="MR" <?php if ($cliente["pais_cliente"] == "MR") : ?>selected<?php endif; ?>>Mauritania</option>
          <option value="YT" <?php if ($cliente["pais_cliente"] == "YT") : ?>selected<?php endif; ?>>Mayotte</option>
          <option value="MX" <?php if ($cliente["pais_cliente"] == "MX") : ?>selected<?php endif; ?>>México</option>
          <option value="FM" <?php if ($cliente["pais_cliente"] == "FM") : ?>selected<?php endif; ?>>Micronesia</option>
          <option value="MD" <?php if ($cliente["pais_cliente"] == "MD") : ?>selected<?php endif; ?>>Moldavia</option>
          <option value="MC" <?php if ($cliente["pais_cliente"] == "MC") : ?>selected<?php endif; ?>>Mónaco</option>
          <option value="MN" <?php if ($cliente["pais_cliente"] == "MN") : ?>selected<?php endif; ?>>Mongolia</option>
          <option value="MS" <?php if ($cliente["pais_cliente"] == "MS") : ?>selected<?php endif; ?>>Montserrat</option>
          <option value="MZ" <?php if ($cliente["pais_cliente"] == "MZ") : ?>selected<?php endif; ?>>Mozambique</option>
          <option value="NA" <?php if ($cliente["pais_cliente"] == "NA") : ?>selected<?php endif; ?>>Namibia</option>
          <option value="NR" <?php if ($cliente["pais_cliente"] == "NR") : ?>selected<?php endif; ?>>Nauru</option>
          <option value="NP" <?php if ($cliente["pais_cliente"] == "NP") : ?>selected<?php endif; ?>>Nepal</option>
          <option value="NI" <?php if ($cliente["pais_cliente"] == "NI") : ?>selected<?php endif; ?>>Nicaragua</option>
          <option value="NE" <?php if ($cliente["pais_cliente"] == "NE") : ?>selected<?php endif; ?>>Níger</option>
          <option value="NG" <?php if ($cliente["pais_cliente"] == "NG") : ?>selected<?php endif; ?>>Nigeria</option>
          <option value="NU" <?php if ($cliente["pais_cliente"] == "NU") : ?>selected<?php endif; ?>>Niue</option>
          <option value="NF" <?php if ($cliente["pais_cliente"] == "NF") : ?>selected<?php endif; ?>>Norfolk</option>
          <option value="NO" <?php if ($cliente["pais_cliente"] == "NO") : ?>selected<?php endif; ?>>Noruega</option>
          <option value="NC" <?php if ($cliente["pais_cliente"] == "NC") : ?>selected<?php endif; ?>>Nueva Caledonia</option>
          <option value="NZ" <?php if ($cliente["pais_cliente"] == "NZ") : ?>selected<?php endif; ?>>Nueva Zelanda</option>
          <option value="OM" <?php if ($cliente["pais_cliente"] == "OM") : ?>selected<?php endif; ?>>Omán</option>
          <option value="NL" <?php if ($cliente["pais_cliente"] == "NL") : ?>selected<?php endif; ?>>Países Bajos</option>
          <option value="PA" <?php if ($cliente["pais_cliente"] == "PA") : ?>selected<?php endif; ?>>Panamá</option>
          <option value="PG" <?php if ($cliente["pais_cliente"] == "PG") : ?>selected<?php endif; ?>>Papúa Nueva Guinea</option>
          <option value="PK" <?php if ($cliente["pais_cliente"] == "PK") : ?>selected<?php endif; ?>>Paquistán</option>
          <option value="PY" <?php if ($cliente["pais_cliente"] == "PY") : ?>selected<?php endif; ?>>Paraguay</option>
          <option value="PE" <?php if ($cliente["pais_cliente"] == "PE") : ?>selected<?php endif; ?>>Perú</option>
          <option value="PN" <?php if ($cliente["pais_cliente"] == "PN") : ?>selected<?php endif; ?>>Pitcairn</option>
          <option value="PF" <?php if ($cliente["pais_cliente"] == "PF") : ?>selected<?php endif; ?>>Polinesia Francesa</option>
          <option value="PL" <?php if ($cliente["pais_cliente"] == "PL") : ?>selected<?php endif; ?>>Polonia</option>
          <option value="PT" <?php if ($cliente["pais_cliente"] == "PT") : ?>selected<?php endif; ?>>Portugal</option>
          <option value="PR" <?php if ($cliente["pais_cliente"] == "PR") : ?>selected<?php endif; ?>>Puerto Rico</option>
          <option value="QA" <?php if ($cliente["pais_cliente"] == "QA") : ?>selected<?php endif; ?>>Qatar</option>
          <option value="UK" <?php if ($cliente["pais_cliente"] == "UK") : ?>selected<?php endif; ?>>Reino Unido</option>
          <option value="CF" <?php if ($cliente["pais_cliente"] == "CF") : ?>selected<?php endif; ?>>República Centroafricana</option>
          <option value="CZ" <?php if ($cliente["pais_cliente"] == "CZ") : ?>selected<?php endif; ?>>República Checa</option>
          <option value="ZA" <?php if ($cliente["pais_cliente"] == "ZA") : ?>selected<?php endif; ?>>República de Sudáfrica</option>
          <option value="DO" <?php if ($cliente["pais_cliente"] == "DO") : ?>selected<?php endif; ?>>República Dominicana</option>
          <option value="SK" <?php if ($cliente["pais_cliente"] == "SK") : ?>selected<?php endif; ?>>República Eslovaca</option>
          <option value="RE" <?php if ($cliente["pais_cliente"] == "RE") : ?>selected<?php endif; ?>>Reunión</option>
          <option value="RW" <?php if ($cliente["pais_cliente"] == "RW") : ?>selected<?php endif; ?>>Ruanda</option>
          <option value="RO" <?php if ($cliente["pais_cliente"] == "RO") : ?>selected<?php endif; ?>>Rumania</option>
          <option value="RU" <?php if ($cliente["pais_cliente"] == "RU") : ?>selected<?php endif; ?>>Rusia</option>
          <option value="EH" <?php if ($cliente["pais_cliente"] == "EH") : ?>selected<?php endif; ?>>Sahara Occidental</option>
          <option value="KN" <?php if ($cliente["pais_cliente"] == "KN") : ?>selected<?php endif; ?>>Saint Kitts y Nevis</option>
          <option value="WS" <?php if ($cliente["pais_cliente"] == "WS") : ?>selected<?php endif; ?>>Samoa</option>
          <option value="AS" <?php if ($cliente["pais_cliente"] == "AS") : ?>selected<?php endif; ?>>Samoa Americana</option>
          <option value="SM" <?php if ($cliente["pais_cliente"] == "SM") : ?>selected<?php endif; ?>>San Marino</option>
          <option value="VC" <?php if ($cliente["pais_cliente"] == "VC") : ?>selected<?php endif; ?>>San Vicente y Granadinas</option>
          <option value="SH" <?php if ($cliente["pais_cliente"] == "SH") : ?>selected<?php endif; ?>>Santa Helena</option>
          <option value="LC" <?php if ($cliente["pais_cliente"] == "LC") : ?>selected<?php endif; ?>>Santa Lucía</option>
          <option value="ST" <?php if ($cliente["pais_cliente"] == "ST") : ?>selected<?php endif; ?>>Santo Tomé y Príncipe</option>
          <option value="SN" <?php if ($cliente["pais_cliente"] == "SN") : ?>selected<?php endif; ?>>Senegal</option>
          <option value="SC" <?php if ($cliente["pais_cliente"] == "SC") : ?>selected<?php endif; ?>>Seychelles</option>
          <option value="SL" <?php if ($cliente["pais_cliente"] == "SL") : ?>selected<?php endif; ?>>Sierra Leona</option>
          <option value="SG" <?php if ($cliente["pais_cliente"] == "SG") : ?>selected<?php endif; ?>>Singapur</option>
          <option value="SY" <?php if ($cliente["pais_cliente"] == "SY") : ?>selected<?php endif; ?>>Siria</option>
          <option value="SO" <?php if ($cliente["pais_cliente"] == "SO") : ?>selected<?php endif; ?>>Somalia</option>
          <option value="LK" <?php if ($cliente["pais_cliente"] == "LK") : ?>selected<?php endif; ?>>Sri Lanka</option>
          <option value="PM" <?php if ($cliente["pais_cliente"] == "PM") : ?>selected<?php endif; ?>>St Pierre y Miquelon</option>
          <option value="SZ" <?php if ($cliente["pais_cliente"] == "SZ") : ?>selected<?php endif; ?>>Suazilandia</option>
          <option value="SD" <?php if ($cliente["pais_cliente"] == "SD") : ?>selected<?php endif; ?>>Sudán</option>
          <option value="SE" <?php if ($cliente["pais_cliente"] == "SE") : ?>selected<?php endif; ?>>Suecia</option>
          <option value="CH" <?php if ($cliente["pais_cliente"] == "CH") : ?>selected<?php endif; ?>>Suiza</option>
          <option value="SR" <?php if ($cliente["pais_cliente"] == "SR") : ?>selected<?php endif; ?>>Surinam</option>
          <option value="TH" <?php if ($cliente["pais_cliente"] == "TH") : ?>selected<?php endif; ?>>Tailandia</option>
          <option value="TW" <?php if ($cliente["pais_cliente"] == "TW") : ?>selected<?php endif; ?>>Taiwán</option>
          <option value="TZ" <?php if ($cliente["pais_cliente"] == "TZ") : ?>selected<?php endif; ?>>Tanzania</option>
          <option value="TJ" <?php if ($cliente["pais_cliente"] == "TJ") : ?>selected<?php endif; ?>>Tayikistán</option>
          <option value="TF" <?php if ($cliente["pais_cliente"] == "TF") : ?>selected<?php endif; ?>>Territorios franceses del Sur</option>
          <option value="TP" <?php if ($cliente["pais_cliente"] == "TP") : ?>selected<?php endif; ?>>Timor Oriental</option>
          <option value="TG" <?php if ($cliente["pais_cliente"] == "TG") : ?>selected<?php endif; ?>>Togo</option>
          <option value="TO" <?php if ($cliente["pais_cliente"] == "TO") : ?>selected<?php endif; ?>>Tonga</option>
          <option value="TT" <?php if ($cliente["pais_cliente"] == "TT") : ?>selected<?php endif; ?>>Trinidad y Tobago</option>
          <option value="TN" <?php if ($cliente["pais_cliente"] == "TN") : ?>selected<?php endif; ?>>Túnez</option>
          <option value="TM" <?php if ($cliente["pais_cliente"] == "TM") : ?>selected<?php endif; ?>>Turkmenistán</option>
          <option value="TR" <?php if ($cliente["pais_cliente"] == "TR") : ?>selected<?php endif; ?>>Turquía</option>
          <option value="TV" <?php if ($cliente["pais_cliente"] == "TV") : ?>selected<?php endif; ?>>Tuvalu</option>
          <option value="UA" <?php if ($cliente["pais_cliente"] == "UA") : ?>selected<?php endif; ?>>Ucrania</option>
          <option value="UG" <?php if ($cliente["pais_cliente"] == "UG") : ?>selected<?php endif; ?>>Uganda</option>
          <option value="UY" <?php if ($cliente["pais_cliente"] == "UY") : ?>selected<?php endif; ?>>Uruguay</option>
          <option value="UZ" <?php if ($cliente["pais_cliente"] == "UZ") : ?>selected<?php endif; ?>>Uzbekistán</option>
          <option value="VU" <?php if ($cliente["pais_cliente"] == "VU") : ?>selected<?php endif; ?>>Vanuatu</option>
          <option value="VE" <?php if ($cliente["pais_cliente"] == "VE") : ?>selected<?php endif; ?>>Venezuela</option>
          <option value="VN" <?php if ($cliente["pais_cliente"] == "VN") : ?>selected<?php endif; ?>>Vietnam</option>
          <option value="YE" <?php if ($cliente["pais_cliente"] == "YE") : ?>selected<?php endif; ?>>Yemen</option>
          <option value="YU" <?php if ($cliente["pais_cliente"] == "YU") : ?>selected<?php endif; ?>>Yugoslavia</option>
          <option value="ZM" <?php if ($cliente["pais_cliente"] == "ZM") : ?>selected<?php endif; ?>>Zambia</option>
          <option value="ZW" <?php if ($cliente["pais_cliente"] == "ZW") : ?>selected<?php endif; ?>>Zimbabue</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Ciudad</label>
        <select name="ciudadCliente" id="ciudadCliente" class="form-control">
          <option value="">Seleccionar</option>
          <option value="La Paz" <?php if ($cliente["ciudad_cliente"] == "La Paz") : ?>selected<?php endif; ?>>La Paz</option>
          <option value="Oruro" <?php if ($cliente["ciudad_cliente"] == "Oruro") : ?>selected<?php endif; ?>>Oruro</option>
          <option value="Potosi" <?php if ($cliente["ciudad_cliente"] == "Potosi") : ?>selected<?php endif; ?>>Potosi</option>
          <option value="Cochabamba" <?php if ($cliente["ciudad_cliente"] == "Cochabamba") : ?>selected<?php endif; ?>>Cochabamba</option>
          <option value="Chuquisaca" <?php if ($cliente["ciudad_cliente"] == "Chuquisaca") : ?>selected<?php endif; ?>>Chuquisaca</option>
          <option value="Tarija" <?php if ($cliente["ciudad_cliente"] == "Tarija") : ?>selected<?php endif; ?>>Tarija</option>
          <option value="Pando" <?php if ($cliente["ciudad_cliente"] == "Pando") : ?>selected<?php endif; ?>>Pando</option>
          <option value="Beni" <?php if ($cliente["ciudad_cliente"] == "Beni") : ?>selected<?php endif; ?>>Beni</option>
          <option value="Santa Cruz" <?php if ($cliente["ciudad_cliente"] == "Santa Cruz") : ?>selected<?php endif; ?>>Santa Cruz</option>
          <option value="Ninguno" <?php if ($cliente["ciudad_cliente"] == "Ninguno") : ?>selected<?php endif; ?>>Otros</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="">Nombre del Cliente</label>
      <input type="text" class="form-control" id="nomCliente" name="nomCliente" value="<?php echo $cliente["nombre_cliente"]; ?>">
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="">Teléfono del Cliente</label>
        <input type="text" class="form-control" id="telCliente" name="telCliente" value="<?php echo $cliente["telefono_cliente"]; ?>">
      </div>
      <div class="form-group col-md-6 ">
        <label for="">Porcentaje de Descuento</label>
        <div class="input-group mb-2">
          <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo $cliente["descuento"]; ?>">
          <div class="input-group-prepend">
            <span class="input-group-text"> %</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="Editcliente()">Guardar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        EditCliente()
      }
    })
    $(document).ready(function() {
      $("#FormEditCliente").validate({
        rules: {
          rzCliente: {
            required: true,
            minlength: 5
          },
          nitCliente: {
            required: true,
          },
          telCliente: {
            required: true,
            minlength: 7
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid')
          /* .is-invalid */
        },

        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid')
        }

      })
    })

  })
</script>
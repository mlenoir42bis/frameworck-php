<?php 
session_start();
//session_unset ();
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
    $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

    $msg = '';
    if (isset($_SESSION['error'])) {
        if ($_SESSION['error'] == true & isset($_SESSION['msg'])) {
            $msg = '<div class="alert alert-danger">' . $_SESSION['msg'] . '</div>';
        }
    }

}
else {
    header("Location: /");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new request - AssurBox ASP.NET Demo</title>
    <link href="/assets/css/style.css" rel="stylesheet"/>

    <script src="/assets/js/modernizr.js"></script>

</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Demo Dealer SI interacting with AssurBox</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/request.php">Requests</a></li>
                    <li><a href="/about.php">About</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <h1>Create new request</h1>

        


<?php
if ($msg !== '') {
    $_SESSION['error'] = false;
    echo $msg;
}
?>

<form action="/setCreate.php" method="post">
<div class="form-horizontal">
    <h4>Green Card Request Initialization</h4>
    <hr />
    <div class="alert alert-info">
        <p>For demo purpose, we generate some data, feel free to change them</p>
    </div>
    <div class="validation-summary-valid text-danger" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>
    
    <fieldset>
        <legend>Customer <small>(should come from the partner information system)</small></legend>

        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_LastName">LastName</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_LastName" name="Customer.Person.LastName" type="text" value="Medhurst" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.LastName" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_FirstName">FirstName</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_FirstName" name="Customer.Person.FirstName" type="text" value="Cassandra" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.FirstName" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_BirthDate">BirthDate</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-date="The field BirthDate must be a date." id="Customer_Person_BirthDate" name="Customer.Person.BirthDate" type="datetime" value="8/16/1997 8:12:14 PM" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.BirthDate" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Email">Email</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Email" name="Customer.Person.Email" type="text" value="Cassandra91@gmail.com" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Email" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Phone">Phone</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Phone" name="Customer.Person.Phone" type="text" value="1-237-700-3231 x4725" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Phone" data-valmsg-replace="true"></span>
            </div>
        </div>
        <h4>Customer address</h4>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Address_City">City</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Address_City" name="Customer.Person.Address.City" type="text" value="Lake Melisa" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Address.City" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Address_ZipOrPostcode">ZipOrPostcode</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Address_ZipOrPostcode" name="Customer.Person.Address.ZipOrPostcode" type="text" value="34058" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Address.ZipOrPostcode" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Address_Street">Street</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Address_Street" name="Customer.Person.Address.Street" type="text" value="Mozelle Bridge" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Address.Street" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Customer_Person_Address_Number">Number</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Customer_Person_Address_Number" name="Customer.Person.Address.Number" type="text" value="69565" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Customer.Person.Address.Number" data-valmsg-replace="true"></span>
            </div>
        </div>

    </fieldset>

    <fieldset>
        <legend>Vehicle data <small>(should come from the partner information system)</small></legend>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_VehicleAcquisitionType">VehicleAcquisitionType</label>
            <div class="col-md-10">
                <select class="form-control" data-val="true" data-val-required="The VehicleAcquisitionType field is required." id="CarDetails_VehicleAcquisitionType" name="CarDetails.VehicleAcquisitionType">
                    <option selected="selected" value="0">Undefined</option>
                    <option value="1">New</option>
                    <option value="2">Used</option>
                </select>
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.VehicleAcquisitionType" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_DateOfVehicleRegistration">DateOfVehicleRegistration</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-date="The field DateOfVehicleRegistration must be a date." id="CarDetails_DateOfVehicleRegistration" name="CarDetails.DateOfVehicleRegistration" type="datetime" value="1/28/2018 5:52:58 PM" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.DateOfVehicleRegistration" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_Fuel">Fuel</label>
            <div class="col-md-10">
                <select class="form-control" data-val="true" data-val-required="The Fuel field is required." id="CarDetails_Fuel" name="CarDetails.Fuel"><option value="0">Undefined</option>
                <option value="2">BicarburationEssenceBioethanol</option>
                <option value="3">BicarburationEssence_GNV</option>
                <option value="4">BicarburationEssence_gpl</option>
                <option value="5">Biocarburant</option>
                <option value="6">Diesel</option>
                <option value="7">Electrique</option>
                <option value="8">Essence</option>
                <option value="9">HybrideDieselElectrique</option>
                <option value="10">HybrideEssenceElectrique</option>
                <option selected="selected" value="11">NC</option>
                </select>

                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.Fuel" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_Make">Make</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_Make" name="CarDetails.Make" type="text" value="Peugeot" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.Make" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_Model">Model</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_Model" name="CarDetails.Model" type="text" value="Peugeot 2008" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.Model" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_Version">Version</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_Version" name="CarDetails.Version" type="text" value="1.4 HDI 68 BUSINESS" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.Version" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_EngineSizeInCm3">EngineSizeInCm3</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-number="The field EngineSizeInCm3 must be a number." data-val-required="The EngineSizeInCm3 field is required." id="CarDetails_EngineSizeInCm3" name="CarDetails.EngineSizeInCm3" type="number" value="2934" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.EngineSizeInCm3" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_EnginePowerInKw">EnginePowerInKw</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-number="The field EnginePowerInKw must be a number." data-val-required="The EnginePowerInKw field is required." id="CarDetails_EnginePowerInKw" name="CarDetails.EnginePowerInKw" type="text" value="186" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.EnginePowerInKw" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_UnloadedWeightInKg">UnloadedWeightInKg</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-number="The field UnloadedWeightInKg must be a number." id="CarDetails_UnloadedWeightInKg" name="CarDetails.UnloadedWeightInKg" type="number" value="1464" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.UnloadedWeightInKg" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_PriceWithOption">PriceWithOption</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_PriceWithOption" name="CarDetails.PriceWithOption" type="text" value="90348" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.PriceWithOption" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_PriceWithoutOption">PriceWithoutOption</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_PriceWithoutOption" name="CarDetails.PriceWithoutOption" type="text" value="86191" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.PriceWithoutOption" data-valmsg-replace="true"></span>
            </div>
        </div>


    </fieldset>

    <fieldset>
        <legend>Request data <small>(could come from the partner information system)</small></legend>

        <div class="form-group">
            
            <label class="control-label col-md-2" for="RecipientInsurer_Name">Insurance </label>
            <div class="col-md-10">
                <select class="form-control" id="RecipientInsurer_VAT" name="RecipientInsurer.VAT"><option value="">Select insurance</option>
                    <option value="LU234567890">Assurance Lambda</option>
                    <option value="LU345678901">Assurance Delta</option>
                    <option value="LU20549987">Axa</option>
                    <option value="LU14673765">Foyer</option>
                    <option value="LU20037536">lalux</option>
                    <option value="LU23760160">Allianz</option>
                    <option value="LU18475984">B&#226;loise</option>
                    <option value="LU4444464654">Touring</option>
                    <option value="LU4444464654">Les AP</option>
                    <option value="LU4444464654">Axa</option>
                    <option value="LU4444464654">Ethias</option>
                </select>
                <span class="field-validation-valid text-danger" data-valmsg-for="RecipientInsurer.VAT" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="EffectiveDate">EffectiveDate</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" data-val="true" data-val-date="The field EffectiveDate must be a date." data-val-required="The EffectiveDate field is required." id="EffectiveDate" name="EffectiveDate" type="datetime" value="<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>" />
                <span class="field-validation-valid text-danger" data-valmsg-for="EffectiveDate" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_LicencePlate">LicencePlate</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_LicencePlate" name="CarDetails.LicencePlate" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.LicencePlate" data-valmsg-replace="true"></span>
                <span class="help-block">Luxembourg format  : 2 letters + 4 digits, or 5 digits, or 4 digits (see <a href="http://www.snca.lu/content/view/316/266/lang,french/">snca website</a> )</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="CarDetails_VIN">VIN</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="CarDetails_VIN" name="CarDetails.VIN" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="CarDetails.VIN" data-valmsg-replace="true"></span>
                <span class="help-block"><a href="http://randomvin.com/" target="_blank">VIN number generator</a></span>

            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="Communication">Communication</label>
            <div class="col-md-10">
                <textarea cols="80" htmlAttributes="{ class = form-control }" id="Communication" name="Communication" rows="5">
</textarea>
                <span class="field-validation-valid text-danger" data-valmsg-for="Communication" data-valmsg-replace="true"></span>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-2" for="RequestType">RequestType</label>
            <div class="col-md-10">
                <select class="form-control" data-val="true" data-val-required="The RequestType field is required." id="RequestType" name="RequestType"><option selected="selected" value="0">New</option>
<option value="1">Transcription</option>
<option value="2">Transfert</option>
</select>

                <span class="field-validation-valid text-danger" data-valmsg-for="RequestType" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-group">
            <p>If RequestType is "Transcription"</p>
            <label class="control-label col-md-2" for="LicencePlateToReplace">LicencePlateToReplace</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="LicencePlateToReplace" name="LicencePlateToReplace" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="LicencePlateToReplace" data-valmsg-replace="true"></span>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="submit" value="Create" class="btn btn-default" />
        </div>
    </div>
</div>
</form>
<div>
    <a href="/request.php">Back to List</a>
</div>

        <hr />
        <footer>
            <p>&copy; 2018 - AssurBox Demo</p>
        </footer>
    </div>

    <script src="/assets/js/jquery.js"></script>

    <script src="/assets/js/bootstrap.js"></script>

</body>
</html>

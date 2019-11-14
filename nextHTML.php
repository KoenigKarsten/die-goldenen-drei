<div class="modal-Box">

    <header>
        <div class='header'>
            <form id='radioStatus'>
                <label for="radioVermietet">
                    <input type="radio" id="radioVermietet" name="bookingOrMaintaince" value="vermieten" checked> vermieten<br>
                </label>
                <label for="radioOOO">
                    <input type="radio" id="radioOOO" name="bookingOrMaintaince" value="in Wartung"> in Wartung<br>
                </label>
            </form> 
        </div>
    </header>
    
    <div class='modal-boxInfo'>
        <form action="modal-boxInfoSave.php" method="post">
            <select name="anrede" id="anrede">
                <option value="herr">Herr</option>
                <option value="frau">Frau</option>
                <option value="divers">Divers</option>
            </select>
            <input type="text" name="vorname" id="vorname" placeholder="Vorname *" required>
            <input type="text" name="nachname" id="nachname" placeholder="Nachname *" required>
            <input type="text" name="strasse" id="strasse" placeholder="Strasse *" required>
            <input type="text" name="hausnummer" id="hausnummer" placeholder="Hausnummer *" required>
            <input type="text" name="postleitzahl" id="postleitzahl" placeholder="Postleitzahl *" required>
            <input type="text" name="land" id="land" placeholder="Land *" required>
            <input type="text" name="zusatz" id="zusatz" placeholder="Zusatz">
            <input type="text" name="telefonNr" id="telefonNr" placeholder="Telefonnummer *" required>
            <input type="text" name="emailAddy" id="emailAddy" placeholder="E-Mail-Adresse">
        </form>
    </div>
</div>
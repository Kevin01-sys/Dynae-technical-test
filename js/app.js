// Restricts input for the given textbox to the given inputFilter function.
const setInputFilter = (textbox, inputFilter, errMsg) => {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
        textbox.addEventListener(event, function(e) {
        if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                this.classList.remove("input-error");
                this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
        // Rejected value - nothing to restore
        this.value = "";
        }
        });
        });
}

// Validate that the form data is correct according to the business logic
function validateFormDates(e) {
        e.preventDefault();
        let startDate = document.getElementById("dateFrom").value;
        let endDate = document.getElementById("dateTo").value;
        let startHour = document.getElementById("hourFrom").value;
        let endHour = document.getElementById("hourTo").value;

        console.log(`Hora inicial: ${startHour}, Hora final: ${endHour}`);
        console.log(`Fecha inicial: ${startDate}, Fecha final: ${endDate}`);

        //only one valid date and time range can be entered
        if(Date.parse(endDate) < Date.parse(startDate)) return alert("La fecha final debe ser mayor a la fecha inicial");
        if(endHour < startHour) return alert("La hora de la fecha final debe ser mayor a la fecha inicial");
        this.submit();
}


/* Functions to be executed when loading the file */
setInputFilter(document.getElementById("temp"), (value) => {
        return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
}, "Solo números y '.' se permiten");

document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formDates").addEventListener('submit', validateFormDates);
});



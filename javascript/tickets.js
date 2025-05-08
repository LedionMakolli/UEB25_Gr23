function updateTicket(location, dateString) {
    // Përpunimi i datës nga stringu
    const dateParts = dateString.split(' ');
    const day = parseInt(dateParts[0]);
    const targetMonth = dateParts[1];
    const monthNames = ["Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nëntor", "Dhjetor"];
    let monthIndex = -1;

    // Po na duhet kjo se tani kur pe preki butonin per daten spo mi qet qato qe i kena shkru
    for (let i = 0; i < monthNames.length; i++) {
        if (monthNames[i] === targetMonth) {
            monthIndex = i;
            break; 
        }
    }

    const year = 2025; 
    const concertDate = new Date(year, monthIndex, day);

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = concertDate.toLocaleDateString('sq-AL', options);

    document.getElementById('ticket-location').innerText = location;
    document.getElementById('ticket-date').innerText = formattedDate;
    document.querySelector('.ticket').scrollIntoView({ behavior: 'smooth' });
    document.getElementById('buy-button').disabled = false;
}

function showPopup() {
    document.getElementById('ticket-popup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('ticket-popup').style.display = 'none';
    document.getElementById('buy-button').disabled = true;
}

const quantityInput = document.getElementById('ticket-quantity');
const amountInput = document.getElementById('amount');
const biletaCmimi = parseFloat(amountInput.dataset.cmimi);

quantityInput.addEventListener('input', function () {
    const quantity = parseInt(this.value) || 1;
    const total = biletaCmimi * quantity;
    amountInput.value = total + "€";
});

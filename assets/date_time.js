function startTime() {
    const today = new Date();
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

    const dateStr = today.toLocaleDateString(undefined, dateOptions);
    const timeStr = today.toLocaleTimeString(undefined, timeOptions);

    document.getElementById('date').textContent = dateStr;
    document.getElementById('clock').textContent = timeStr;

    setTimeout(startTime, 1000); // Update every second
}
window.onload = startTime;
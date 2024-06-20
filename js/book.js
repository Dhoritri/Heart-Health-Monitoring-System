document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('bookingForm').classList.add('hidden');
    document.getElementById('confirmationMessage').classList.remove('hidden');
});

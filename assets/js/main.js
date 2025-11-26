document.addEventListener('DOMContentLoaded', () => {

    const cartButtons = document.querySelectorAll('.add-to-cart-btn');

    cartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const beatId = e.target.getAttribute('data-beat-id');

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `beat_id=${beatId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`"${beatId}" added successfully! Items in cart: ${data.count}`);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('An error occurred while adding to cart.');
            });
        });
    });
});
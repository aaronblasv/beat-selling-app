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

const removeButtons = document.querySelectorAll('.remove-from-cart-btn');

removeButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        const beatId = e.target.getAttribute('data-beat-id');
        
        // Envía la petición al script PHP
        fetch('remove_from_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `beat_id=${beatId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`Beat ID ${beatId} removed. Items left: ${data.count}`);
                
                // Opción más limpia: Recargar la página para actualizar el carrito visualmente
                window.location.reload(); 
            } else {
                alert('Error removing beat: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('An error occurred while removing from cart.');
        });
    });
});
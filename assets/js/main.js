import WaveSurfer from 'https://cdn.jsdelivr.net/npm/wavesurfer.js@7/dist/wavesurfer.esm.js';

function createWaveSurfer(containerId, audioUrl) {
    const ws = WaveSurfer.create({
        container: `#${containerId}`,
        waveColor: '#b83535ff',
        progressColor: '#832929ff',
        height: 80,
    });

    // carga la URL del audio
    ws.load(audioUrl);

    ws.on('click', () => {
        ws.play()
    })
    // eventos mínimos para sincronizar la UI del botón
    ws.on('play', () => {
        // manejo en el listener del botón (se actualizará si existe)
    });
    ws.on('pause', () => { });
    ws.on('finish', () => { });

    return ws;
}

document.addEventListener('DOMContentLoaded', () => {
    // Map para relacionar data-audio-id (playN1) con la instancia WaveSurfer
    const wsMap = {};

    // Inicializa WaveSurfer para cada contenedor .waveform
    document.querySelectorAll('.waveform').forEach(div => {
        const src = div.dataset.src;
        if (!src) return;
        const containerId = div.id; // ej. "wave-playN1"
        const audioId = containerId.replace(/^wave-/, ''); // -> "playN1"
        const ws = createWaveSurfer(containerId, src);
        wsMap[audioId] = ws;

        // Sincronizar imagenes de botones si éstos existen en el DOM
        const btn = document.querySelector(`.playButton[data-audio-id="${audioId}"]`);
        if (btn) {
            const img = btn.querySelector('img');
            // actualizar img cuando cambien estados
            ws.on('play', () => { if (img) img.src = 'assets/img/pausa.png'; });
            ws.on('pause', () => { if (img) img.src = 'assets/img/play.png'; });
            ws.on('finish', () => { if (img) img.src = 'assets/img/play.png'; });
        }
    });

    // Play/pause handlers para botones (conecta al WaveSurfer correspondiente)
    document.querySelectorAll('.playButton').forEach(btn => {
        const audioId = btn.getAttribute('data-audio-id'); // ej. "playN1"
        const img = btn.querySelector('img');
        const ws = wsMap[audioId];

        // fallback: si no hay WaveSurfer, intentar controlar un elemento <audio> con ese id
        const audioEl = !ws ? document.getElementById(audioId) : null;

        btn.addEventListener('click', () => {
            if (ws) {
                // preferir método playPause si existe
                if (typeof ws.playPause === 'function') {
                    ws.playPause();
                } else if (ws.isPlaying && typeof ws.isPlaying === 'function') {
                    if (ws.isPlaying()) ws.pause(); else ws.play();
                } else {
                    // intento genérico
                    ws.play();
                }
                // img se actualizará por los listeners ws.on('play'/'pause'/'finish')
                return;
            }

            if (audioEl) {
                if (audioEl.paused) {
                    audioEl.play();
                    if (img) img.src = 'assets/img/pausa.png';
                } else {
                    audioEl.pause();
                    if (img) img.src = 'assets/img/play.png';
                }
                audioEl.addEventListener('ended', () => {
                    if (img) img.src = 'assets/img/play.png';
                });
            }
        });
    });

    // Carrito: add / remove
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const beatId = button.getAttribute('data-beat-id');
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `beat_id=${encodeURIComponent(beatId)}`
            })
                .then(r => r.json())
                .then(data => {
                    if (data.success) alert(`"${beatId}" added successfully! Items in cart: ${data.count}`);
                    else alert('Error: ' + data.message);
                })
                .catch(() => alert('An error occurred while adding to cart.'));
        });
    });

    document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const beatId = button.getAttribute('data-beat-id');
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `beat_id=${encodeURIComponent(beatId)}`
            })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert('Error removing beat: ' + data.message);
                    }
                })
                .catch(() => alert('An error occurred while removing from cart.'));
        });
    });
});
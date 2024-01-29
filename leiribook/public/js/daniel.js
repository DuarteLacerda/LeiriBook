// Assuming you have Axios included in your project
// You can install it via npm: npm install axios

const selectBox = document.getElementById('estado'); // Replace with the actual ID of your select box

selectBox.addEventListener('change', async () => {
    const livroId = window.location.pathname.split('/').pop(); // Extract livroId from the URL

    try {
        await axios.patch(`/interesses/${livroId}`, { estado: selectBox.value });
        console.log('State updated successfully');
    } catch (error) {
        console.error('Error updating state:', error);
    }
});

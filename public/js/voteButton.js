function toggleLike(balasanId) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
    fetch('/toggle-like', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token,
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        balasan_id: balasanId
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        console.error('Error:', data.error);
      } else {
        document.getElementById('likeCount' + balasanId).innerText = data.likeCount;
        if (data.liked) {
          document.getElementById('likeButton' + balasanId).classList.add('text-red-500');
        } else {
          document.getElementById('likeButton' + balasanId).classList.remove('text-red-500');
        }
      }
    })
    .catch(error => console.error('Error:', error));
  }
  
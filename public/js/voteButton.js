window.toggleLike = function(balasanId) {
  if (!window.currentUserUid) {
      alert("Anda harus login terlebih dahulu.");
      return;
  }
  
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch('/vote/toggle-like', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json'
      },
      body: JSON.stringify({
          balasan_id: balasanId,
          user_uid: window.currentUserUid  // UID dari Firebase
      })
  })
  .then(response => response.json())
  .then(data => {
      if (data.error) {
          console.error('Error:', data.error);
          return;
      }

      const likeCountElem = document.getElementById(`likeCount${balasanId}`);
      if (likeCountElem) {
          likeCountElem.textContent = data.likeCount;
      }

      const likeButton = document.getElementById(`likeButton${balasanId}`);
      if (likeButton) {
          if (data.liked) {
              likeButton.classList.add('liked');
          } else {
              likeButton.classList.remove('liked');
          }
      }
  })
  .catch(error => console.error('Error:', error));
};

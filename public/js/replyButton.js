document.querySelectorAll('.reply-toggle').forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const commentId = this.getAttribute('data-comment-id');
      const replyForm = document.getElementById('replyForm' + commentId);
      replyForm.classList.toggle('hidden');
    });
  });


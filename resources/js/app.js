window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141125068-1');

(function() {
  jQuery('#comment-form').validate({
    rules: {
      author: {
        required: true,
        letterswithbasicpunc: true,
        nameLength: true
      },
      comment_field: {
        required: true
      }
    },
    messages: {
      author: {
        required:
          '<span class="pf-5 text-danger align-middle">' +
          '&nbsp <i class="fas fa-exclamation-circle"></i> Enter a name please!' +
          '</span>',
        letterswithbasicpunc:
          '<span class="pf-5 text-danger align-middle">' +
          '&nbsp <i class="fas fa-exclamation-circle"></i> The name must contain only letters!' +
          '</span>',
        nameLength:
          '<span class="pf-5 text-danger align-middle">' +
          '&nbsp <i class="fas fa-exclamation-circle"></i> The name must be at least 3 chars!' +
          '</span>'
      },
      comment_field: {
        required:
          '<span class="pf-5 text-danger align-middle">' +
          '&nbsp <i class="fas fa-exclamation-circle"></i> Enter a comment please!' +
          '</span>'
      }
    }
  });
})();

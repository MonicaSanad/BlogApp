articles = document.getElementById('art');
deleteButton = document.getElementById('deleteButton');

if(articles){
    articles.addEventListener('click', e => {
        if(e.target.className = 'btn btn-primary delete-article'){
            if(confirm('Are you sure you want to permanently delete this article?')){
                const id = e.target.getAttribute('data-id');
                fetch(`/article/delete/${id}`, {
                method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
      });
    }


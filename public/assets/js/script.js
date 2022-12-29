const btns = document.querySelectorAll('.acao');
btns.forEach(btn => {
    btn.addEventListener('click', e => {
      const {value, id} = e.target;
      if (id === 'deletar') {
        document.querySelector('#delLink').setAttribute('href', `delete/?id=${value}`);
      }
    });
});
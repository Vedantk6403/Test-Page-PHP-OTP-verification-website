Dnotes = document.getElementsByClassName('delete');
Array.from(Dnotes).forEach((element) => {
  element.addEventListener("click", (e) => {
    $('#delModal').modal('toggle');
    tr = e.target.parentNode.parentNode;
    srnoDelete.value = tr.getElementsByTagName('td')[0].innerText;
  })
})
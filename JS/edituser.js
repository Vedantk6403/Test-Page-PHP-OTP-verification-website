
Employee = document.getElementsByClassName('edits');
Array.from(Employee).forEach((element) => {
  element.addEventListener("click", (e) => {
    $('#myModal').modal('toggle');
    tr = e.target.parentNode.parentNode;
    name = tr.getElementsByTagName('td')[1].innerText;
    salary = tr.getElementsByTagName('td')[2].innerText;
    date = tr.getElementsByTagName('td')[3].innerText;

    console.log(name);
    console.log(salary);
    console.log(date);

    nameEdit.value = name;
    salaryEdit.value = salary;
    dateEdit.value = date;
    val = tr.getElementsByTagName('td')[0].innerText;
    srnoEdit.value = val;
    // console.log(e.target.id);
  })
});


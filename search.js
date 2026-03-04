const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("keyup", function(){

let keyword = searchInput.value.toLowerCase();

fetch("php/fetch_students.php")
.then(response => response.json())
.then(data => {

let table = document.getElementById("studentTable");
table.innerHTML = "";

let filtered = data.filter(student =>
student.name.toLowerCase().includes(keyword) ||
student.email.toLowerCase().includes(keyword)
);

filtered.forEach(student => {

let row = `
<tr>
<td>${student.name}</td>
<td>${student.email}</td>
<td>${student.age}</td>
<td>${student.gender}</td>
<td>${student.skills}</td>
<td>${student.department}</td>
<td>${student.date}</td>
<td><img src="uploads/${student.image}" class="profile-img"></td>
<td>${student.comments}</td>
</tr>
`;

table.innerHTML += row;

});

});

});
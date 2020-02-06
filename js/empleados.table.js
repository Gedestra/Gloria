var HTMLtable = document.getElementById("tableBody");
var table = $.ajax({
    type : "GET",
    url : "funciones/empleados.table.php",
    beforesend: function() {},
    success : res => {
        createTable(res);
    },
    error : err => {
        console.error(err);     
    }
});

function createTable(res){
    
    res = JSON.parse(res);
    let dataTable = [];
    res.forEach(element => {
        dataTable.push("<tr>" + "<td>" + element[0] + "</td>" + 
                        "<td>" + element[1] + "</td>" 
                        + "<td>" + element[2] + "</td>" +
                        "<td>" + element[3] + "</td>" +
                        "<td>" + element[4] + "</td>"
                        + "</tr>")
    });

    let print = "";
    dataTable.forEach(element => print = print + element);

    HTMLtable.innerHTML = print;
}

/*var content = [
    {
        message: "hello",
        content: "hello world!"
    },
    {
        message: "with love",
        content: "with love from me to you"
    },
    {
        message: "can't buy me love!",
        content: "can't buy me love! can't buy me love!"
    },
    {
        message: "help!",
        content: "i need somebody, help!"
    },
];

let datatable = [];
content.forEach(element => {
    datatable.push("<tr>" + "<td>" + element.message + "</td>" + "<td>" + element.content + "</td>" + "</tr>");
})

let print = ""; 
datatable.forEach(element => {
    print = print + element;
});

table.innerHTML = print;*/
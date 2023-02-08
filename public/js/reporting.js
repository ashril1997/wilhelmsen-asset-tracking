

// //paging code
// addPagerToTables('#myTable', 4);

// function addPagerToTables(tables, rowsPerPage = 10) {

//     tables = 
//         typeof tables == "string"
//       ? document.querySelectorAll(tables)
//       : tables;

//     for (let table of tables) 
//         addPagerToTable(table, rowsPerPage);

// }

// function addPagerToTable(table, rowsPerPage = 10) {

//     let tBodyRows = getBodyRows(table);
//     let numPages = Math.ceil(tBodyRows.length/rowsPerPage);

//     let colCount = 
//       [].slice.call(
//           table.querySelector('tr').cells
//       )
//       .reduce((a,b) => a + parseInt(b.colSpan), 0);

//     table
//     .createTFoot()
//     .insertRow()
//     .innerHTML = `<td colspan=${colCount}><div class="nav"></div></td>`;

//     if(numPages == 1)
//         return;

//     for(i = 0;i < numPages;i++) {

//         let pageNum = i + 1;

//         table.querySelector('.nav')
//         .insertAdjacentHTML(
//             'beforeend',
//             `<a href="#" rel="${i}">${pageNum}</a> `        
//         );

//     }

//     changeToPage(table, 1, rowsPerPage);

//     for (let navA of table.querySelectorAll('.nav a'))
//         navA.addEventListener(
//             'click', 
//             e => changeToPage(
//                 table, 
//                 parseInt(e.target.innerHTML), 
//                 rowsPerPage
//             )
//         );

// }

// function changeToPage(table, page, rowsPerPage) {

//     let startItem = (page - 1) * rowsPerPage;
//     let endItem = startItem + rowsPerPage;
//     let navAs = table.querySelectorAll('.nav a');
//     let tBodyRows = getBodyRows(table);

//     for (let nix = 0; nix < navAs.length; nix++) {

//         if (nix == page - 1)
//             navAs[nix].classList.add('active');
//         else 
//             navAs[nix].classList.remove('active');

//         for (let trix = 0; trix < tBodyRows.length; trix++) 
//             tBodyRows[trix].style.display = 
//                 (trix >= startItem && trix < endItem)
//                 ? 'table-row'
//                 : 'none';  

//     }

// }

// // tbody might still capture header rows if 
// // if a thead was not created explicitly.
// // This filters those rows out.
// function getBodyRows(table) {
//     let initial = table.querySelectorAll('tbody tr');
//   return Array.from(initial)
//     .filter(row => row.querySelectorAll('td').length > 0);
// }


// //create table filter
// function FilterVessel() {
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("vesselInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//       td = tr[i].getElementsByTagName("td")[0];
//       if (td) {
//         txtValue = td.textContent || td.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         } else {
//           tr[i].style.display = "none";
//         }
//       }       
//     }
//   }

// function FilterStatus() {
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("statusInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//       td = tr[i].getElementsByTagName("td")[1];
//       if (td) {
//         txtValue = td.textContent || td.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         } else {
//           tr[i].style.display = "none";
//         }
//       }       
//     }
//   }



//function to get year
var select = document.getElementById('get_year');
var date = new Date();
var year = date.getFullYear();
for (var i = year - 4; i <= year + 3; i++) {
  var option = document.createElement('option');
  option.value = option.innerHTML = i;
  // if (i === year) option.selected = true;
   select.appendChild(option);
}
//document.body.appendChild(select);
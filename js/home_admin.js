function showTable(tableName) {
  // Perform an AJAX request to fetch table data
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `process/aksi_admin.php?table=${tableName}`, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        const tableData = JSON.parse(xhr.responseText);
        const tableContainer = document.getElementById('table-container');

        // Generate table HTML
        let tableHtml = '<table class="table table-bordered">';
        tableHtml += '<thead><tr>';
        for (const key in tableData[0]) {
          tableHtml += `<th>${key}</th>`;
        }
        tableHtml += '<th>Actions</th>';
        tableHtml += '</tr></thead><tbody>';

        tableData.forEach((row) => {
          tableHtml += '<tr>';
          for (const key in row) {
            tableHtml += `<td>${row[key]}</td>`;
          }
          tableHtml += `
                        <td>
                            <button class="edit btn btn-primary" onclick="editRow('${tableName}', ${row.id})">Edit</button>
                            <button class="delete btn btn-danger" onclick="deleteRow('${tableName}', ${row.id})">Delete</button>
                        </td>
                    `;
          tableHtml += '</tr>';
        });
        tableHtml += '</tbody></table>';

        tableContainer.innerHTML = tableHtml;
      } catch (error) {
        console.error('Failed to parse JSON response:', error);
      }
    } else {
      console.error('Failed to fetch data from server:', xhr.statusText);
    }
  };
  xhr.send();
}

function editRow(tableName, id) {
  alert(`Editing row ${id} from table ${tableName}`);
  // Add your edit functionality here
}

function deleteRow(tableName, id) {
  alert(`Deleting row ${id} from table ${tableName}`);
  // Add your delete functionality here
}

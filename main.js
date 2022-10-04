var add = $("#add");
var services = $("#services")[0];
var submit = $("#submit");
var total_price = $("#total_price")[0];
service_row_id = 0

add.click(add_service);
submit.click(submit_data);

function add_service() {
    var newRow = document.createElement('tr');
    var colName = document.createElement('td');
    var colPrice = document.createElement('td');
    var colCross = document.createElement('td');
    var Name = document.createElement('input');
    var Price = document.createElement('input');
    var Cross = document.createElement('button');


    newRow.id = "service_" + service_row_id;
    Name.classList = "form-control form-control-sm services_input";
    Name.placeholder = "Service Name";
    Price.classList = "form-control form-control-sm services_price";
    Price.placeholder = "Price";
    Price.type = "number"
    Price.value = 0

    Cross.classList = " btn btn-sm btn-danger";
    Cross.innerText = "X"
    Cross.setAttribute("onClick", `delServiceRow(${service_row_id})`);

    colName.appendChild(Name);
    colPrice.appendChild(Price);
    colCross.appendChild(Cross);
    newRow.appendChild(colName);
    newRow.appendChild(colPrice);
    newRow.appendChild(colCross);
    services.appendChild(newRow);
    updatePrice();
    price_input = $(".services_price");
    price_input.change(updatePrice);
    service_row_id++;
}

function submit_data() {
    var all_data = {data: [], services: []}

    var date = $("#date")[0]
    var name = $("#c_name")[0]
    var num = $("#num")[0]
    var man = $("#man")[0]
    var model = $("#model")[0]
    var plate_number = $("#plate_number")[0]

    all_data.data.push([date.id, date.value]);
    all_data.data.push([name.id, name.value]);
    all_data.data.push([num.id, num.value]);
    all_data.data.push([man.id, man.value]);
    all_data.data.push([model.id, model.value]);
    all_data.data.push([plate_number.id, plate_number.value]);

    var services_input = $(".services_input");
    var services_price = $(".services_price");
    for (i = 0; i < services_input.length; i++) {
        var service = services_input[i].value;
        var price = services_price[i].value;
        if (!price) price = 0
        if (service) all_data.services.push([service, price]);
    }

    const myJSON = JSON.stringify(all_data);
    console.log(myJSON);

    $.ajax({
        type: "POST",
        url: "save_data_bike.php",
        dataType: "json",
        data: {raw_json :myJSON},
        success: function(msg) {
            alert("Your Data has been saved");
            window.location.reload();
        }
    });
}


function updatePrice() {
    var services_price = $(".services_price");
    var total_price_value = 0;
    for (i = 0; i < services_price.length; i++) {
        var price = parseInt(services_price[i].value);
        if (!price) price = 0
        total_price_value += price;
    }
    total_price.innerText = total_price_value;
    console.log(total_price_value);
}

function delServiceRow(row_id) {
    var row_id = "service_" + row_id
    $(`#${row_id}`).remove()
    updatePrice()
}

function get_order_id() {
    var order_id_label = $("#order_id")[0]
    console.log(order_id_label);
    $.ajax({
        type: "get",
        url: "get_order_id.php",
        success: function(msg) {
            order_id_label.innerText = msg;
        }
    });
}

get_order_id()
add_service()
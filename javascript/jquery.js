function velemenyszerkesztes(id)
{
    const velemeny = $(`#hid-${id} .velemeny`);

    hideButtons(id);

    const eredetiVelemeny = velemeny[0].childNodes[0].nodeValue;
    const adat = `${id}------${eredetiVelemeny}`;
    velemeny.html(`<input id="edited-value-${id}" type="text" name="velemeny" value="${eredetiVelemeny.trim()}">
    <button onclick="mentes('${adat}')">Mentés</button>
    <button onclick="megse('${adat}')">Mégse</button>
    `)
}

function velemenytorles(id) {

    hideButtons(id);

    const message = $(`#hid-${id} .torles-megerosites`);
    message.html(`<p>Biztosan torolni szeretned ezt a velemenyedet?</p>
    <button onclick="torles('${id}')">Igen</button>
    <button onclick="megseTorol('${id}')">Mégse</button>
    `)
}

function megseTorol(id) {
    const message = $(`#hid-${id} .torles-megerosites`);
    message.text("");

    showButtons(id);
}

function megse(data)
{
    const [id, eredetiVelemeny] = data.split('------');
    const velemeny = $(`#hid-${id} .velemeny`);
    velemeny.text(eredetiVelemeny)

    showButtons(id);
}

function mentes(adat)
{
    const [id, eredetiVelemeny] = adat.split('------');
    const velemeny = $(`#edited-value-${id}`)
    const velemenyErtek = velemeny[0].value;
    const baseUrl = `${window.location.origin}/web_II_beadando/`;
    $.ajax({
        type: "PUT",
        url: baseUrl + "controllers/ajaxKezelo.php",
        data: {action: "update", id, velemenyErtek},
        success: function(response)
        {
            const jsonData = JSON.parse(response);
            
            const velemeny = $(`#hid-${id} .velemeny`);
            const datum = $(`#hid-${id} .datum`);

            if (jsonData.eredmeny == 'OK') {
                velemeny.text(jsonData.ertekek.velemeny);
                datum.text(jsonData.ertekek.datum);

            } else if (jsonData.eredmeny === 'ERROR') {
                const error = $(`#hid-${id} .error-uzenet`);
                velemeny.text(eredetiVelemeny);
                error.text(jsonData.uzenet);
                error.css("color", "red");
                setTimeout(() => {
                    error.text("");
                }, 3000)
            }

            showButtons(id);
       }
   });
}

function torles(id) {
    const baseUrl = `${window.location.origin}/web_II_beadando/`;

    $.ajax({
        type: "DELETE",
        url: baseUrl + "controllers/ajaxKezelo.php",
        data: {action: "delete", id},
        success: function(response)
        {
            const jsonData = JSON.parse(response);
            
            
            if (jsonData.eredmeny == 'OK') {
                const velemeny = $(`#hid-${id}`);
                velemeny.remove();
            } else if (jsonData.eredmeny === 'ERROR') {
                const error = $(`#hid-${id} .error-uzenet`);
                error.text(jsonData.uzenet);
                error.css("color", "red");
                setTimeout(() => {
                    error.text("");
                }, 3000)
                showButtons(id);
            }

       }
   });
}



function showButtons (id) {
    const editButton = $(`#hid-${id} .edit-button`);
    const deleteButton = $(`#hid-${id} .delete-button`);
    editButton.css("display", "inline-block");
    deleteButton.css("display", "inline-block");
}

function hideButtons(id) {
    const editButton = $(`#hid-${id} .edit-button`);
    const deleteButton = $(`#hid-${id} .delete-button`);
    editButton.css("display", "none");
    deleteButton.css("display", "none");
}



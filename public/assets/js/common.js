function addTo(target, productId, quantity, force=false) {
    let route = "/" + target + "/add";
    let data = {
        'id': productId,
        'quantity': quantity
    };
    if (force) {
        data.force = true;
        toggle('askModal');
    }
    axios.post(route, data)
        .then((res) => {
            console.log(res);
            if (res.status == 200) {
                toggle('successModal');
            }
            if (res.status == 202) {
                toggle('askModal', data, target + 'Data');
            }
        });
}

function addToForce(target) {
    let _data = document.getElementById(target + 'Data').value;
    // console.log("추가하기" + _data);
    if (_data) {
        _data = JSON.parse(_data);
        addTo(target, _data.id, _data.quantity, true);
    }
}

function toggle(modalId, data = null, dataId = null) {
    let modal = document.getElementById(modalId);
    let modal_backdrop = document.getElementById(modalId + '-backdrop');

    if (data !== null && dataId !== null) {
        console.log(data);
        console.log(dataId);
        let _data = document.getElementById(dataId);
        _data.value = JSON.stringify(data);
    }

    modal.classList.toggle("hidden");
    modal_backdrop.classList.toggle("hidden");
    modal.classList.toggle("flex");
    modal_backdrop.classList.toggle("flex");
}
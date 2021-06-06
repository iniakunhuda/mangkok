function showAlert(response) {
    if(response.status == 200) {
        let data = response.data;
        if(data.status == 200) {
            swal(
                "Berhasil!",
                data.message,
                "success"
            );
        } else {
            swal(
                "Gagal!",
                data.message,
                "error"
            );
        }
    } else {
        swal(
            "Gagal!",
            "Ada yang salah, hubungi administrator!",
            "error"
        );
    }
}

function countCart() {
    let url = API_URL + "cart/count";
    axios.get(url)
    .then(function (response) {
        let count = response.data;
        if(count == 0) {
            $('.total__cart').addClass('hidden');
        } else {
            $('.total__cart').removeClass('hidden');
            $('.total__cart').text(count);
        }
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });  
}

function addToCart(id, qty, note) {
    let url = API_URL + "cart/add/" + id;
    axios.post(url,{
        qty: qty,
        note: note
    })
    .then(function (response) {
        showAlert(response);
        countCart();
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });  
}

function removeFromCart(id) {
    let url = API_URL + "cart/remove/" + id;
    axios.post(url)
    .then(function (response) {
        showAlert(response);
    })
    .catch(function (error) {
        showAlert(error);
    });  
}

function destroyCart() {
    let url = API_URL + "cart/destroy";
    axios.post(url)
    .then(function (response) {
        showAlert(response);
    })
    .catch(function (error) {
        showAlert(error);
    });  
}

countCart();
/**
 * 수정 form에 반영
 */
function setData(result, elements) {
    Object.entries(result).forEach(entry => {
        const [key, val] = entry;

        if (elements[key] !== undefined) {
            var _el = document.querySelector('#edit_' + key);

            if (elements[key] == 'src') {
                _el.setAttribute(elements[key], "/storage/" + val);
            } else if (elements[key] == 'checked') {
                if (val == 'Y') _el.setAttribute(elements[key], true);
                else _el.removeAttribute(elements[key]);
            } else {
                _el.setAttribute(elements[key], val);
            }
        }
    });
}
/** 
 * 데이터 받아와서 setData 실행
 */
function getData(id) {
    var url = getUrl + id;
    axios
        .get(url)
        .then((res) => {
            if (res.status === 200) {
                setData(res.data.banner, els);
            }
        })
        .catch((err) => {
            console.log("에러 발생 " + err);
        });
}
/** 등록하기 */
function register() {
    send(registerElement, registerUrl);
}
/** 수정하기 */
function edit() {
    send(editElement, editUrl);
}
/** form data post 전송 */
function send(el, route) {
    const form = document.querySelector(el);
    event.preventDefault();

    const formData = new FormData(form);
    axios
        .post(route, formData)
        .then((res) => {
            // console.log(res);
            if (res.status === 200) {
                //alert("등록 완료");
                // const target = document.querySelector('#toast-success');
                // target.classList.remove('hidden');
                // const msg = document.querySelector('#toast-message');
                // msg.innerText = "message here";
                location.reload();
            }
        })
        .catch((err) => {
            console.log("에러 발생 " + err);
        });
}
function setCategory(result) {
    // console.log(result);
    document.querySelector('#xData')._x_dataStack[0].categoryInfo = result;
    document.querySelector('#xData')._x_dataStack[0].cate();
}
/**
 * 수정 form에 반영
 */
function setData(result, elements) {
    // console.log(result, elements);

    Object.entries(result).forEach(entry => {
        const [key, val] = entry;
        // console.log(key + " : " + val);
        // console.log(elements[key]);
        
        if (elements[key] !== undefined && typeof elements[key] !== 'object') {
            /** category는 여기에서 설정하지 않음 */
            if (key !== 'category' && key !== 'parent2') {
                let _el = document.querySelector('#edit_' + key);
                // console.log(_el);

                if (elements[key] == 'src') {
                    _el.setAttribute(elements[key], "/storage/" + val);
                } else if (elements[key] == 'checked') {
                    if (val == 'Y') {
                        // _el.setAttribute(elements[key], true);
                        _el._x_model.set(true);
                    }
                    else {
                        // _el.removeAttribute(elements[key]);
                        _el._x_model.set(false);
                    }
                } else if (key == 'detail') {
                    tinymce.get('edit_detail').setContent(val);
                } else {
                    _el.value = val;
                }
            }
        }
        /**
         * nested object 경우 여기에서 처리
         */
        if (elements[key] instanceof Object) {
            for (let k in elements[key]) {
                // console.log("key : " + key);
                let _el = document.querySelector('#edit_' + k);

                if (val instanceof Object && typeof val[k] == 'undefined') {
                    // console.log("k : " + k);
                    // console.log("val : " + val[0][k]);
                    // console.log("val[k] : " + val[k]);
                    // console.log("type : " + typeof val);
                    Object.entries(val).forEach(v => {
                        const [i, j] = v;
                        // console.log("j[k] : " + j[k]);
                        _el.value = j[k];
                    });
                } else {
                    _el.value = val[k];
                }
            }
        }        
    });
}
/** 
 * 데이터 받아와서 setData 실행
 */
function getData(model, id) {
    var url = getUrl + id;
    axios
        .get(url)
        .then((res) => {
            // console.log(res.data[model]);
            if (res.status === 200) {
                /**
                 * 카테고리는 복잡해서 별도로 지정
                 */
                if (res.data['product.category']) {
                    // console.log(res.data['category']);
                    setCategory(res.data['product.category']);
                }
                setData(res.data[model], els);
            }
        })
        .catch((err) => {
            console.log("에러 발생 " + err);
        });
}

if (typeof registerElementName !== "undefined") {
    registerElement = document.querySelector(registerElementName);
    registerElement.addEventListener("submit", (e) => {
        e.preventDefault();
        register();
    });
}

if (typeof editElementName !== "undefined") {
    editElement = document.querySelector(editElementName);
    editElement.addEventListener("submit", (e) => {
        e.preventDefault();
        edit();
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
    tinymce.triggerSave();

    const form = el;
    const formData = new FormData(form);

    axios
        .post(route, formData)
        .then((res) => {
            // console.log(res);
            if (res.status === 200) {
                //alert("등록 완료");
                const target = document.querySelector('#toast-success');
                target.classList.remove('hidden');
                const msg = document.querySelector('#toast-message');
                msg.innerText = "등록이 완료되었습니다.";
                
                setTimeout(() => { location.reload(); }, 1000);
            }
        })
        .catch((err) => {
            console.log("에러 발생 " + err);

            const target = document.querySelector('#toast-danger');
            target.classList.remove('hidden');
            const msg = document.querySelector('#toast-message');
            msg.innerText = "오류로 인해 저장하지 못했습니다. 관리자에게 문의하세요.";

            setTimeout(() => { location.reload(); }, 1000);
        });
}

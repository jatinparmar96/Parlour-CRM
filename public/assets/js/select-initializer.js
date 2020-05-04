function setSelectResource(url, selectId, dropDownParent = null, stringifyValue = false) {
    axios.get(url).then((data) => {
        let parsedData = JSON.parse(data.data.data);

        if (stringifyValue) {
            parsedData = parsedData.map(value => {
                return {'id': JSON.stringify(value), 'text': value.name}
            });
        } else {
            parsedData = parsedData.map(value => {
                return {'id': value.id, 'text': value.name}
            });
        }
        parsedData.unshift({'id': 0, 'text': 'Select a value'});
        if (!dropDownParent) {
            $("#" + selectId).select2({
                dropdownParent: $("#form-body"),
                data: parsedData
            });
        } else {
            $("#" + selectId).select2({
                dropdownParent: $("#" + dropDownParent),
                data: parsedData
            });
        }
    }).catch(error => console.error(error));
}

function checkForm(form)
    {
        if(form.first_name.value == "")
        {
            alert("Error: First Name cannot be blank and less than two characters!");
            form.first_name.focus();
            return false;
        } re = /^[A-Za-z]+$/;
        if (!re.test(form.first_name.value)){
            alert("Error: Username must contain only letters!");
            form.first_name.focus();
            return false
        }

        if(form.last_name.value == "" || form.last_name.value < 2)
        {
            alert("Error: First Name cannot be blank!");
            form.last_name.focus();
            return false;
        } re = /^[A-Za-z]+$/;
        if (!re.test(form.last_name.value)){
            alert("Error: Username must contain only letters!");
            form.last_name.focus();
            return false
        }

        if(form.last_name.value == "")
        {
            alert("Error: First Name cannot be blank!");
            form.last_name.focus();
            return false;
        } re = /^[A-Za-z]+$/;
        if (!re.test(form.last_name.value)){
            alert("Error: Username must contain only letters!");
            form.last_name.focus();
            return false
        }
    }
    
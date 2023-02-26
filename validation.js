
const validation = new JustValidate("#signup"); 

validation  
    .addField('#name', [
        { 
        rule: 'required'
    }
])

    .addField('#email', [ 
    { 
        rule: 'required'
    },
    { 
        rule: 'email'
    }
]) 

    .addField('#password_1', [ 
        { 
            rule: 'required'
        } ,
        { 
            rule: 'password'
        }
    ])

    .addField("#password_2", [ 
        { 
            validator: (value, fields) => { 
                return value === fields["#password_1"].elem.value;
            }, 
            errorMessage: "Password does not match"
        }
    ])

    // $("button").click( function(e) { 
    //     alert("hi");
    // });


    .onSuccess((event) => {
        document.getElementById("signup").submit();  // Event Declaration is not happening
    });

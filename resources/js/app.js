import "./bootstrap";


// using public channel
// Echo.channel("notifications").listen("UserSessionChanged", (e) => {
//     const notificationElement = document.getElementById("notification");
//     notificationElement.innerText = e.message;

//     notificationElement.classList.remove("invisible");
//     notificationElement.classList.remove("alert-success");
//     notificationElement.classList.remove("alert-danger");

//     notificationElement.classList.add("alert-" + e.type);
// });

// using private channel
Echo.private("notifications").listen("UserSessionChanged", (e) => {
    const notificationElement = document.getElementById("notification");
    notificationElement.innerText = e.message;

    notificationElement.classList.remove("invisible");
    notificationElement.classList.remove("alert-success");
    notificationElement.classList.remove("alert-danger");

    notificationElement.classList.add("alert-" + e.type);
});

// window.axios
//     .get("/api/users")
//     .then((res) => {
//         const usersElement = document.getElementById("users");
//         let users = res.data;
//         users.forEach((user, index) => {
//             let element = document.createElement("li");
//             element.setAttribute("id", user.id);
//             element.innerText = user.name;
//             usersElement.appendChild(element);
//         });
//     })
//     .catch((e) => console.log(e));

// Echo.channel("users")

//     .listen("UserUpdated", (e) => {
//         console.log("UserUpdated");
//         const element = document.getElementById(e.user.id);
//         element.innerText = e.user.name;
//     })
//     .listen("UserCreated", (e) => {
//         console.log("UserCreated");
//         const usersElement = document.getElementById("users");
//         let element = document.createElement("li");
//         element.setAttribute("id", e.user.id);
//         element.innerText = e.user.name;
//         usersElement.appendChild(element);
//     })
//     .listen("UserDeleted", (e) => {
//         console.log("UserDeleted");
//         const element = document.getElementById(e.user.id);
//         element.parentNode.removeChild(element);
//     });

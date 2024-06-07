$("body").on("click", ".btn-approved", async (e) => {
    state.handleStatus(
        $(e.currentTarget).data("id"),
        $(e.currentTarget).data("type"),
        "approved"
    );
});
$("body").on("click", ".btn-disapproved", async (e) => {
    state.handleStatus(
        $(e.currentTarget).data("id"),
        "disapproved",
        "cancelled"
    );
});
const state = {
    handleStatus: async (id, type, status) => {
        let code = "";
        if (type === "Online") {
            const { value: url } = await Swal.fire({
                input: "url",
                title: "Enter Google meet link",
                inputPlaceholder: "Enter the LINK",
            });
            if (url) {
                code = url;
            }
        } else if (type === "Visit") {
            const { value: ipAddress } = await Swal.fire({
                title: "Enter Room number",
                input: "text",
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return "You need to write something!";
                    }
                },
            });
            if (ipAddress) {
                code = ipAddress;
            }
        } else {
            const { value: text } = await Swal.fire({
                input: "textarea",
                inputLabel: "Message",
                inputPlaceholder: "Type your reason here...",
                inputAttributes: {
                    "aria-label": "Type your reason why disapproved",
                },
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return "You need to write something!";
                    }
                },
            });
            if (text) {
                code = text;
            }
        }
        if (!code) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                showConfirmButton: false,
                timer: 3000,
                text: "Canceled Operation!",
            });
            return;
        }
        const response = await fetch(`../api/${status}/${id}`, {
            method: "put",
            headers: {
                "Content-Type": "application/json",
                enctype: "multipart/form-data",
            },
            body: JSON.stringify({
                code,
            }),
        });
        if (response.status === 404 || response.status === 500) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                showConfirmButton: false,
                timer: 3000,
                text: "The server responded with an unexpected status!",
            });
        } else if (response.status === 204) {
            return null;
        }

        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Email sent successfully",
            showConfirmButton: false,
            timer: 1500,
        });
        const element = document.querySelector(`[data-name="${id}"]`);

        if (element) {
            element.remove();
        } else {
            console.error(`Element with data-name="${name}" not found`);
        }
    },
};

const url = "https://v2.jokeapi.dev/joke/Any?lang=fr&blacklistFlags=nsfw,racist,sexist,explicit";

fetch(url)
    .then(response =>
    {
        if (!response.ok)
        {
            throw new Error(`Erreur HTTP : ${response.status}`);
        }
        console.log(response);
    })
    .catch(error =>
    {
        console.error("Erreur lors de la requête :", error.message);
    });
<?php

function validerForm(): array //définition des règles des différents champs des formulaires
{
    return [
        'nom' => [
            'required' => true,
            'min' => 2,
            'max' => 255
        ],
        'prenom' => [
            'required' => false,
            'min' => 2,
            'max' => 255
        ],
        'eMail' => [
            'type' => 'email',
            'required' => true
        ],
        'message' => [
            'required' => true,
            'min' => 10,
            'max' => 3000
        ],
        'pseudo' => [
            'required' => true,
            'min' => 2,
            'max' => 255
        ],
        'connexionPseudo' => [
            'required' => true,
            'min' => 2,
            'max' => 255
        ],
        'connexionMotDePasse' => [
            'required' => true,
            'min' => 8,
            'max' => 72
        ],
        'inscriptionPseudo' => [
            'required' => true,
            'min' => 2,
            'max' => 255
        ],
        'inscriptionEmail' => [
            'type' => 'email',
            'required' => true
        ],
        'inscriptionMotDePasse' => [
            'required' => true,
            'min' => 8,
            'max' => 72
        ],
        'inscriptionMotDePasseConfirmation' => [
            'required' => true
        ]
    ];
}

function messagevalidation(): array //définition des messages liés aux règles des champs
{
    return [
        'required' => 'Champ requis',
        'eMail' => 'Adresse e-mail invalide',
        'min' => 'Le champ doit contenir minimum %0% caractères',
        'max' => 'Le champ doit contenir maximum %0% caractères',
        'match' => 'Les mots de passe entrés ne correspondent pas'
    ];
}

function validateForm($formData): array //validation du formulaire
{
    $errors = [];
    $validations = validerForm(); //récupère les règles de validation des formulaires
    $messages = messagevalidation(); //récupère les messages liés aux règles des champs

    foreach ($validations as $field => $rules) {
        if (isset($formData[$field])) {
            if (isset($rules['required']) && $rules['required'] && empty($formData[$field])) {
                $errors[$field] = $messages['required'];
                continue;
            }

            if (isset($rules['required']) && $rules['required'] && empty($formData[$field])) {
                $errors[$field] = $messages['required'];
                continue;
            }

            if (isset($rules['min']) && strlen($formData[$field] ?? '') < $rules['min']) {
                $errors[$field] = str_replace('%0%', $rules['min'], $messages['min']);
            }

            if (isset($rules['max']) && strlen($formData[$field] ?? '') > $rules['max']) {
                $errors[$field] = str_replace('%0%', $rules['max'], $messages['max']);
            }

            if ($field === 'inscriptionMotDePasseConfirmation') {
                if ($formData[$field] !== $formData['inscriptionMotDePasse']) {
                    $errors[$field] = $messages['match'];
                }
            }

            if ($field === 'eMail' && isset($rules['type']) && $rules['type'] === 'email') {
                if (!filter_var($formData[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = $messages['eMail'];
                }
            }
        }
    }

    return $errors; //retourne le tableau des erreurs à afficher sous les champs du formulaire
}

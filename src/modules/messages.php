<?php

    function printMessage($message){
        if($message == 'success-create')
            return '<span class="text-success"> Registro criado com sucesso!</span>';
        if($message == 'error-create'){
            return '<span class="text-error">Erro ao criar registro.</span>';
        }
        if($message == 'success-remove')
            return '<span class="text-success> Registro removido com sucesso</span>';
        if($message=='error-remove'){
            return '<span class="text-error">Erro ao remover o registro. </span>';
        }

        if($message=='success-update')
            return '<span class="text-success"> Atualização feita com sucesso! </span>';
        if($message=='error-update')
            return '<span class="text-error"> Erro ao atualizar o registro.</span>';

    }
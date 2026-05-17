<div class="hello-box
    {if $is_logged}logged{/if}
    {if !$is_logged}guest{/if}">
    <h2>{l s='Hello' mod='hello'} {$customer_name}!</h2>
    <p>{l s='Welcome in my module!' mod='hello'} {l s='Created by' mod='hello'} <a target="_blank" href="https://github.com/PATER10"><b>Patryk Kubik</b></a>.</p>
</div>
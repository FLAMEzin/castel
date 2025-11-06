@extends('layouts.app')
@section('title', 'Mensagem Enviada • Castel')

{{-- Esta página não tem conteúdo visual, apenas aciona o alerta e redireciona. --}}

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    Swal.fire({
      title: 'Enviado com Sucesso!',
      text: 'Sua mensagem foi recebida. Entraremos em contato em breve.',
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: 'var(--brand-blue)'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redireciona para a página de contato após o usuário fechar o alerta.
        window.location.href = '{{ route("contato") }}';
      }
    });
  });
</script>
@endsection

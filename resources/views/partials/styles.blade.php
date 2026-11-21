{{-- Shared CSS for all pages --}}
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', sans-serif; background: #130f1c; color: #e9d5ff; min-height: 100vh; }

    header {
        background: #1d162c; border-bottom: 1px solid #2e2040;
        padding: 16px 40px; display: flex; align-items: center;
        justify-content: space-between; position: sticky; top: 0; z-index: 100;
        box-shadow: 0 4px 24px rgba(0,0,0,.5);
    }
    header h1 { font-size: 1.3rem; font-weight: 700; color: #e9d5ff; letter-spacing: .5px; }
    header h1 span { color: #fb7185; }
    nav { display: flex; align-items: center; gap: 0; }
    nav a {
        color: #8b6aaa; text-decoration: none; margin-left: 28px;
        font-size: .88rem; font-weight: 500; transition: color .2s;
    }
    nav a:hover { color: #e9d5ff; }
    nav a.active { color: #fb7185; border-bottom: 2px solid #fb7185; padding-bottom: 2px; }
    .nav-logout {
        background: none; border: 1px solid #3d2545; border-radius: 6px;
        color: #8b6aaa; cursor: pointer; font-family: inherit; font-size: .85rem;
        margin-left: 28px; padding: 5px 14px; transition: color .2s, border-color .2s;
    }
    .nav-logout:hover { color: #fb7185; border-color: #fb7185; }

    main { max-width: 1000px; margin: 52px auto; padding: 0 28px; }

    .page-title { display: flex; align-items: center; gap: 12px; margin-bottom: 28px; flex-wrap: wrap; }
    .page-title h2 { font-size: 1.6rem; font-weight: 700; color: #e9d5ff; }
    .record-count {
        background: #1d162c; color: #fb7185; border: 1px solid #3d2545;
        border-radius: 20px; padding: 3px 12px; font-size: .78rem; font-weight: 600;
    }
    .btn-add {
        margin-left: auto;
        background: linear-gradient(135deg, #e11d48, #fb7185);
        color: #fff; text-decoration: none; border-radius: 8px; padding: 8px 18px;
        font-size: .85rem; font-weight: 600; transition: opacity .2s;
    }
    .btn-add:hover { opacity: .88; }

    .flash-success {
        background: rgba(74,222,128,.1); border: 1px solid rgba(74,222,128,.3);
        color: #4ade80; border-radius: 8px; padding: 12px 16px; margin-bottom: 20px; font-size: .9rem;
    }

    table {
        width: 100%; border-collapse: collapse; background: #1d162c;
        border-radius: 12px; overflow: hidden; border: 1px solid #2e2040;
        box-shadow: 0 8px 40px rgba(0,0,0,.5);
    }
    thead { background: #241a38; border-bottom: 1px solid #3d2545; }
    thead th {
        padding: 14px 20px; text-align: left; font-size: .73rem;
        letter-spacing: 1.4px; text-transform: uppercase; color: #8b6aaa; font-weight: 600;
    }
    tbody tr { border-bottom: 1px solid #241a38; transition: background .15s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #241a38; }
    tbody td { padding: 14px 20px; font-size: .92rem; color: #c9a8e8; vertical-align: middle; }

    .badge-id {
        display: inline-block; background: linear-gradient(135deg, #e11d48, #fb7185);
        color: #fff; border-radius: 20px; padding: 3px 11px;
        font-size: .75rem; font-weight: 700;
    }

    .btn-sm {
        font-size: .78rem; font-weight: 500; border-radius: 6px; padding: 4px 12px;
        text-decoration: none; border: 1px solid #3d2545; color: #8b6aaa;
        transition: color .2s, border-color .2s; cursor: pointer; background: none; font-family: inherit;
        margin-right: 6px;
    }
    .btn-sm:hover { color: #fb7185; border-color: #fb7185; }
    .btn-sm.danger:hover { color: #f87171; border-color: #f87171; }

    .empty-msg {
        text-align: center; padding: 60px; color: #4a3560; font-size: .95rem;
        font-style: italic; background: #1d162c; border: 1px dashed #2e2040; border-radius: 12px;
    }

    /* Form styles */
    .form-wrap { max-width: 620px; margin: 52px auto; padding: 0 28px; }
    .page-header { margin-bottom: 28px; display: flex; align-items: center; gap: 14px; }
    .page-header h2 { font-size: 1.5rem; font-weight: 700; color: #e9d5ff; }
    .back-link {
        font-size: .82rem; color: #8b6aaa; text-decoration: none;
        border: 1px solid #3d2545; border-radius: 8px; padding: 5px 12px;
    }
    .back-link:hover { color: #e9d5ff; border-color: #8b6aaa; }
    .card {
        background: #1d162c; border: 1px solid #2e2040;
        border-radius: 14px; padding: 36px; box-shadow: 0 8px 40px rgba(0,0,0,.5);
    }
    .form-group { margin-bottom: 22px; }
    label {
        display: block; font-size: .78rem; font-weight: 600; letter-spacing: 1px;
        text-transform: uppercase; color: #8b6aaa; margin-bottom: 8px;
    }
    input[type="text"], input[type="email"] {
        width: 100%; background: #241a38; border: 1px solid #3d2545;
        border-radius: 8px; padding: 11px 14px; color: #e9d5ff;
        font-family: inherit; font-size: .93rem; transition: border-color .2s;
    }
    input:focus { outline: none; border-color: #fb7185; }
    input.is-invalid { border-color: #f87171; }
    input[type="file"] {
        width: 100%; background: #241a38; border: 1px dashed #3d2545;
        border-radius: 8px; padding: 10px 14px; color: #c9a8e8;
        font-family: inherit; font-size: .88rem; cursor: pointer;
    }
    .error-msg { margin-top: 6px; font-size: .8rem; color: #f87171; }
    .form-hint { margin-top: 5px; font-size: .78rem; color: #6b4e82; }
    .btn-primary {
        background: linear-gradient(135deg, #e11d48, #fb7185);
        color: #fff; border: none; border-radius: 8px; padding: 11px 26px;
        font-family: inherit; font-size: .92rem; font-weight: 600;
        cursor: pointer; transition: opacity .2s;
    }
    .btn-primary:hover { opacity: .88; }
    .btn-secondary { color: #8b6aaa; text-decoration: none; font-size: .9rem; margin-left: 16px; }
    .btn-secondary:hover { color: #e9d5ff; }

    /* Avatar */
    .avatar-section { display: flex; align-items: center; gap: 20px; margin-bottom: 10px; }
    .avatar-preview { width: 72px; height: 72px; border-radius: 50%; object-fit: cover; border: 2px solid #3d2545; }
    .avatar-placeholder {
        width: 72px; height: 72px; border-radius: 50%;
        background: linear-gradient(135deg, #e11d48, #7c3aed);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; font-weight: 700; color: #fff; border: 2px solid #3d2545; flex-shrink: 0;
    }
    .avatar-img { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 2px solid #3d2545; }
    .avatar-sm {
        width: 38px; height: 38px; border-radius: 50%;
        background: linear-gradient(135deg, #e11d48, #7c3aed);
        display: inline-flex; align-items: center; justify-content: center;
        font-size: .78rem; font-weight: 700; color: #fff; border: 2px solid #3d2545;
    }

    footer { text-align: center; padding: 32px; color: #3d2545; font-size: .8rem; margin-top: 60px; border-top: 1px solid #1d162c; }
</style>

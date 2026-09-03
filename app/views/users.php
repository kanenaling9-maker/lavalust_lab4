<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        :root {
            --black: #09070f;
            --surface: #12101b;
            --surface-light: #1b1728;
            --purple: #9b5cff;
            --purple-dark: #6636b5;
            --white: #ffffff;
            --muted: #b9b2c9;
            --line: rgba(255, 255, 255, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Trebuchet MS", Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            color: var(--white);
            background: var(--black);
            background-image: linear-gradient(135deg, #09070f 0%, #171027 55%, #09070f 100%);
        }

        .container {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
            padding: 64px 0;
        }

        .eyebrow {
            margin: 0 0 12px;
            color: var(--purple);
            font-size: 0.75rem;
            font-weight: bold;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 32px;
        }

        h1 {
            margin: 0;
            color: var(--white);
            font-size: clamp(2rem, 5vw, 3.5rem);
            line-height: 1;
            letter-spacing: -0.03em;
        }

        .summary {
            min-width: 150px;
            padding: 16px 20px;
            border: 1px solid var(--purple-dark);
            border-radius: 8px;
            background: var(--surface);
            text-align: right;
        }

        .summary strong {
            display: block;
            color: var(--white);
            font-size: 1.8rem;
        }

        .summary span {
            color: var(--muted);
            font-size: 0.8rem;
        }

        .table-shell {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: rgba(18, 16, 27, 0.92);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        table th {
            background: var(--purple-dark);
            color: var(--white);
            padding: 18px 20px;
            text-align: left;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        table td {
            padding: 18px 20px;
            border-bottom: 1px solid var(--line);
            color: var(--muted);
        }

        table td:first-child {
            color: var(--purple);
            font-weight: bold;
        }

        table tr:hover {
            background: var(--surface-light);
        }

        table tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.025);
        }

        table tr:last-child td {
            border-bottom: 0;
        }

        .empty-state {
            padding: 40px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--surface);
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 640px) {
            .container {
                width: min(100% - 24px, 1100px);
                padding: 36px 0;
            }

            .header {
                align-items: start;
                flex-direction: column;
            }

            .summary {
                width: 100%;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <p class="eyebrow">LavaLust / Directory</p>
                <h1>User Management</h1>
            </div>
            <?php if (!empty($users)): ?>
                <div class="summary">
                    <strong><?php echo count($users); ?></strong>
                    <span>registered users</span>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($users)): ?>
            <div class="table-shell">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="empty-state">No users found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

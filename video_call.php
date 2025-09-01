<?php $pageTitle = "Video Call"; include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelloDoc - Video Call</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Video Call Page Specific Styles */
        .video-call-container {
            background: linear-gradient(135deg, var(--bg-dark) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-white);
            text-align: center;
            padding: 2rem;
        }

        .video-call-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 800px;
            width: 100%;
        }

        .video-call-box h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--accent-blue);
        }

        .video-call-box p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .video-placeholder {
            width: 100%;
            height: 400px;
            background: #000;
            border-radius: 15px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #ccc;
            border: 2px solid var(--accent-blue);
        }

        .call-controls button {
            background: var(--btn-primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin: 0 10px;
            transition: background-color 0.3s ease;
        }

        .call-controls button.end-call {
            background: var(--status-error);
        }

        .call-controls button:hover {
            background: var(--primary-medium);
        }

        .call-controls button.end-call:hover {
            background: #cc0000;
        }

        @media (max-width: 768px) {
            .video-call-box {
                padding: 2rem;
            }
            .video-call-box h1 {
                font-size: 2rem;
            }
            .video-call-box p {
                font-size: 1rem;
            }
            .video-placeholder {
                height: 300px;
            }
            .call-controls button {
                padding: 10px 20px;
                font-size: 0.9rem;
                margin: 0 5px;
            }
        }

        @media (max-width: 480px) {
            .video-call-box {
                padding: 1.5rem;
            }
            .video-call-box h1 {
                font-size: 1.8rem;
            }
            .video-placeholder {
                height: 200px;
            }
            .call-controls {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }
            .call-controls button {
                width: 100%;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="video-call-container">
        <div class="video-call-box">
            <h1>Live Consultation</h1>
            <p>Connecting you with your doctor...</p>
            <div class="video-placeholder">Video Feed Here</div>
            <div class="call-controls">
                <button>🎙️ Mute</button>
                <button>📹 Stop Video</button>
                <button class="end-call">📞 End Call</button>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

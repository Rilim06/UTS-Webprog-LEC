<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @charset "UTF-8";
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            font-family: "Montserrat", sans-serif;
            background-image: url("../assets/bg.jpg");
            background-size: cover;
        }

        .form {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            display: flex;
            flex-direction: column;
            border-radius: 0.75rem;
            background-color: #fff;
            color: rgb(97, 97, 97);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 22rem;
            background-clip: border-box;
        }

        .header {
            position: relative;
            background-clip: border-box;
            background: rgb(71, 73, 115);
            background: linear-gradient(45deg, rgb(71, 73, 115) 0%, rgb(166, 156, 172) 100%);
            margin: 10px;
            border-radius: 0.75rem;
            overflow: hidden;
            color: #fff;
            box-shadow: 0 0 rgba(0, 0, 0, 0), 0 0 rgba(0, 0, 0, 0), 0 0 rgba(0, 0, 0, 0), 0 0 rgba(0, 0, 0, 0), rgba(33, 150, 243, 0.4);
            height: 7rem;
            letter-spacing: 0;
            line-height: 1.375;
            font-weight: 600;
            font-size: 1.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .inputs {
            padding: 1.5rem;
            gap: 1rem;
            display: flex;
            flex-direction: column;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            min-width: 200px;
            width: 100%;
            height: 2.75rem;
            position: relative;
        }

        .input {
            border: 1px solid rgba(128, 128, 128, 0.61);
            outline: 0;
            color: rgb(69, 90, 100);
            font-weight: 400;
            font-size: 0.9rem;
            line-height: 1.25rem;
            padding: 0.75rem;
            background-color: transparent;
            border-radius: 0.375rem;
            width: 100%;
            height: 100%;
        }

        .input:focus {
            border: 1px solid #1e88e5;
        }

        .checkbox-container {
            margin-left: -0.625rem;
            display: inline-flex;
            align-items: center;
        }

        .checkbox {
            position: relative;
            overflow: hidden;
            padding: 0.55rem;
            border-radius: 999px;
            display: flex;
            align-items: center;
            cursor: pointer;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.027);
            height: 35px;
            width: 35px;
        }

        .checkbox input {
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .checkbox-text {
            cursor: pointer;
        }

        .sigin-btn {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.75rem;
            line-height: 1rem;
            text-align: center;
            padding: 0.75rem 1.5rem;
            background: rgb(71, 73, 115);
            background: linear-gradient(225deg, rgb(71, 73, 115) 0%, rgb(166, 156, 172) 100%);
            border-radius: 0.5rem;
            width: 100%;
            outline: 0;
            border: 0;
            color: #fff;
        }

        .signup-link {
            line-height: 1.5;
            font-weight: 300;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-link a,
        .forget {
            line-height: 1.5;
            font-weight: 700;
            font-size: 0.875rem;
            margin-left: 0.25rem;
            color: #1e88e5;
        }

        .forget {
            text-align: right;
            font-weight: 600;
        }

        .backBtn {
            position: absolute;
            bottom: 0;
        }

        .backBtn a button {
            display: inline-block;
            border-radius: 4px;
            background-color: #3d405b;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 16px;
            width: 130px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .backBtn a button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            padding-right: 15px;
        }

        .backBtn a button span:after {
            content: "«";
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            transition: 0.5s;
        }

        .backBtn a button:hover span {
            padding-right: 0;
        }

        .backBtn a button:hover span:after {
            opacity: 1;
            left: 15px;
        }

        @media screen and (max-width: 1599px) {
            .backBtn {
                bottom: 50vw;
            }

            .sub-input {
                display: flex;
                gap: 20px;
            }
        }

        @media screen and (max-width: 1399px) {
            .backBtn {
                bottom: 0vw;
            }

            .sub-input {
                display: flex;
                gap: 20px;
            }

            @media screen and (max-width: 1279px) {
                .backBtn {
                    bottom: 0;
                }

                .sub-input {
                    display: flex;
                    gap: 20px;
                }
            }

            @media screen and (max-width: 900px) {
                .backBtn {
                    bottom: 10%;
                }

                .sub-input {
                    display: flex;
                    gap: 20px;
                }
            }

            @media screen and (max-width: 762px) {
                .backBtn {
                    bottom: 10%;
                }
            }

            @media screen and (max-width: 389px) {
                .backBtn {
                    bottom: 0;
                }
            }

            /*# sourceMappingURL=add.css.map */
    </style>
</head>

<div class="flex justify-center">
    <form class="form" action="add_process.php" method="POST" enctype="multipart/form-data">
        <div class="header">Add Menu</div>
        <div class="inputs">
            <div class="sub-input">
                <input class="input" type="text" name="name" placeholder="Name" required />
                <input class="input" type="text" name="category" placeholder="Category" required />
            </div>
            <div class="sub-input">
                <input class="input" type="text" name="price" placeholder="Price" required />
                <input class="input" type="text" name="description" placeholder="Description" required />
            </div>
            <label>Picture</label>
            <input type="file" name="foto" required />
            <input type="submit" value="" hidden>
            <button class="sigin-btn">Save</button>
            </input>
        </div>
    </form>
</div>
import styled from "styled-components";


const BannerEstilizado = styled.div`
    align-items: center;
    background: linear-gradient(rgba(0, 0, 0, 0.03), rgba(0, 0, 0, 0.1)), url(${props => props.$backgroundImage});
    background-repeat: no-repeat;
    background-position: 100% 100%;
    background-size: cover;
    border-radius: 20px;
    display: flex;
    height: 330px;
    padding-left: 60px;

    h1 {
        color: white;
        font-weight: 400;
        font-size: 40px;
        line-height: 52px;
        margin: 0;
        width: 300px;
    }

`

const Banner = ({ texto, backgroundImage }) => {
    return (
        <BannerEstilizado $backgroundImage={backgroundImage}>
            <h1>{texto}</h1>
        </BannerEstilizado>
    )
}

export default Banner;
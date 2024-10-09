import styled from 'styled-components';
import tags from './tags.json';

const TagEstilizada = styled.button`
    background: rgba(217, 217, 217, 0.3);
    border-radius: 10px;
    border: none;
    color: white;
    cursor: pointer;
    height: fit-content;
    padding: 12px;
    transition: background-color 0.3s ease;
    width: fit-content;

    &:hover {
      border-color: #C98CF1;
    }
`

const TagsContainer = styled.div`
    align-items: center;
    display: flex;
    gap: 24px;

    p {
        color: white;
        font-size: 24px;
        margin: 0;
    }
`


const Tags = () => {
    return (
        <>
            <TagsContainer>
            <p>Busque por tags:</p>
            {tags.map(tag => <TagEstilizada key={tag.id}>{tag.titulo}</TagEstilizada>)}
            </TagsContainer>
        </>
    )
}

export default Tags;